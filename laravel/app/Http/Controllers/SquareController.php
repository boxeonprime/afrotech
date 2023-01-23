<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\OrderPlaced;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SquareController extends Controller
{
    public $config;

    public function __construct()
    {

        $this->config = parse_ini_file(dirname(__DIR__, 3) .
            "/config/app.ini", true);

    }

    public function test()
    {
        return redirect('/home/subscriptions');

        $id = auth()->user()->id;
        $user = User::find($id);

        return new OrderPlaced($user);

        #Queue an order-placed system email
        $details['email'] = $user->email;
        $message = new OrderPlaced($user);
        SendEmailJob::dispatch($details, $message)->onQueue('emails');

    }

    /*
     * Creates a one-time payment
     */
    public function charge($charge)
    {

        if (isset($charge->user_id)) {

            $user = User::find($charge->user_id);

        } else {

            $id = auth()->user()->id;
            $user = User::find($id);

        }

        $amount = (int) $charge->price * 100;

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['paymentsEndpoint'], [
            "idempotency_key" => $charge->key,
            "amount_money" => [
                "amount" => $amount,
                "currency" => "USD",
            ],
            "source_id" => $user->card_id,
            "customer_id" => $user->customer_id,
            "autocomplete" => true,
            "location_id" => $this->config['square']['locationId'],
            "note" => "One-time purchase",
            "app_fee_money" => [
                "amount" => 0,
                "currency" => "USD"]]);

        if ($response->status() == 200) {

            $completed = json_decode($response);

            if ($completed->payment->id) {

                // Save Payment Id
                DB::table("subscriptions")
                    ->where("user_id", "=", $id)
                    ->where("product_id", "=", $charge->product)
                    ->update([

                        'sub_id' => $completed->payment->id,
                        'card_id' => $user->card_id,
                        'status' => 1,

                    ]);

                return true;

            } else {

                return json_encode(array('status' => 'FAILURE'));
                //return $response;
            }

        }

    }

    public function createCustomer()
    {
       
        $id = auth()->user()->id;
        $user = User::find($id);

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['customersEndpoint'], [

            "given_name" => $user->billing_given_name ?? $user->given_name,
            "family_name" => $user->billing_family_name ?? $user->family_name,
            "email_address" => $user->email,
            "address" => [
                "address_line_1" => $user->billing_address_line_1 ?? $user->address_line_1,
                "address_line_2" => $user->billing_address_line_2 ?? $user->address_line_2 ?? "",
                "locality" => $user->billing_admin_area_2 ?? $user->admin_area_2,
                "administrative_district_level_1" => $user->billing_admin_area_1 ?? $user->admin_area_1,
                "postal_code" => $user->billing_postal_code ?? $user->postal_code,
                "country" => $user->billing_country_code ?? $user->country_code,
            ],
            "cardholder_name" => $user->billing_given_name ?? $user->given_name . "" . $user->billing_family_name ?? $user->family_name,
            "reference_id" => '#early',
        ]);
       
       return json_decode($response);
      

    }

    public function createPayment($request)
    {

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['paymentsEndpoint'], [

            "idempotency_key" => $request->sourceId,
            "amount_money" => [
                "amount" => $request['amount'],
                "currency" => "USD",
            ],
            "source_id" => $request->sourceId,
            "autocomplete" => true,
            "location_id" => $this->config['square']['locationId'],
            "reference_id" => "creator-id-" . $request['id'],

        ]);

        $created = json_decode($response);

        if (isset($created->payment->id)) {

            return $created->payment->id;

        } else {

            return array("status"=> "FAILURE");
        }

    }

    public function createCard(Request $request)
    {
        $request = json_decode($request["upsert"]);

        $id = auth()->user()->id;
        $user = User::find($id);

        // Checkpoint 1
        if (!isset($user->customer_id)) {

            $new = self::createCustomer();

            if (isset($new->customer->id)) {

                $user->customer_id = $new->customer->id;
                $user->save();

            } else {


                return json_encode(array('status' => 'FAILURE', 'message' => 'Unable to verify customer details'));

            }
        }

        // Reload
        $user = User::find($id);

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['cardsEndpoint'], [

            "idempotency_key" => $request->sourceId,
            "source_id" => $request->sourceId,
            "card" => [
                "billing_address" => [
                    "address_line_1" => $user->billing_address_line_1 ?? $user->address_line_1,
                    "address_line_2" => $user->billing_address_line_2 ?? $user->address_line_2 ?? "",
                    "locality" => $user->billing_admin_area_2 ?? $user->admin_area_2,
                    "administrative_district_level_1" => $user->billing_admin_area_1 ?? $user->admin_area_1,
                    "postal_code" => $user->billing_postal_code ?? $user->postal_code,
                    "country" => $user->billing_country_code ?? $user->country_code,
                ],
                "cardholder_name" => $user->billing_given_name ?? $user->given_name . " " . $user->billing_family_name ?? $user->family_name,
                "customer_id" => $user->customer_id,
                "reference_id" => "creator-id-" . $user->id,
            ],

        ]);

        // Save card ID

        $response = json_decode($response);

        if (isset($response->card->id)) {
            $user->card_id = $response->card->id;
            $user->save();
            
        } else {
            return json_encode(array('status' => 'FAILURE', 'message' => 'Unable to verify card'));

        }

    }

    public function createPlan($plan)
    {
        // Preparation for Square API

        if ($plan["frequency"] == 1) {

            $plan["cadence"] = "MONTHLY";

        } elseif ($plan["frequency"] == 2) {

            $plan["cadence"] = "EVERY_TWO_MONTHS";

        } elseif ($plan["frequency"] == 3) {

            $plan["cadence"] = "NINETY_DAYS";

        } elseif ($plan["frequency"] == 4) {

            $plan["cadence"] = "ANNUAL";
        }

        $price = (int) $plan["amount"] * 100;

        // NB: Returns

        return $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['plansEndpoint'], [

            "idempotency_key" => $plan["key"],
            "object" => [
                "type" => "SUBSCRIPTION_PLAN",
                "id" => "#plan",
                "subscription_plan_data" => [
                    "name" => $plan["product"],
                    "phases" => [
                        [
                            "cadence" => $plan["cadence"],
                            "recurring_price_money" => [
                                "amount" => $price,
                                "currency" => "USD",
                            ],
                        ],
                    ],
                ],
            ],

        ]);

    }

    public function createSubscription($request)
    {
        if (isset($request["user_id"])) {

            $user = User::find($request["user_id"]);

        } else {

            $id = auth()->user()->id;
            $user = User::find($id);

        }

        $created_at = date('Y-m-d');

        return Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->post($this->config['square']['subscriptionsEndpoint'], [

            "idempotency_key" => $request["key"],
            "plan_id" => $request['plan_id'],
            "customer_id" => $user->customer_id,
            "card_id" => $user->card_id,
            "location_id" => $this->config['square']['locationId'],
            "start_date" => $created_at,
            "tax_percentage" => '0',
            'timezone' => 'America/New_York',
            "source" => [
                "name" => "Boxeon",
            ]]);

        # Update D

    }

    public function deleteSubscription($request)
    {

        $endpoint = $this->config['square']['subscriptionsEndpoint'] . "/" . $request['sub_id'] . "/cancel";

        return $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->put($endpoint);

    }

    public function updateSubscription($request)
    {

        $response = Http::withHeaders(
            [
                'Authorization' => "Bearer " . $this->config['square']['access_token'],
                'Content-Type' => 'application/json',
                'Square-Version' => "2022-01-20",
            ]
        )->put($this->config['square']['subscriptionsEndpoint'] . "/" . $request['sub_id'], [

            "subscription" => [
                "cadence" => $request['cadence'],
                "version" => $request['square_vid'],
            ],
        ]);

        return json_decode($response);

    }

    public function __destruct()
    {
        unset($this->config);
    }

}
