@extends('layouts.checkout')
@section('content')

    <main id="checkout-main" class="margin-auto">
        <section class="max-width-1035 margin-top-4-em card">
            <section class="max-width-1035">
                <div>
                    <button id="zelle" class="clearbtn w100per uppercase">Donate via Money App</button>
                    <div id="zelle-show" class="works-wrapper">
                       
                        <table>
                            <tr>
                              <th>Cash App</th>
                              <th>Zelle</th>
                              <th>Venmo</th>
                            </tr>
                            <tr>
                              <td>$afrotok</td>
                              <td>zelle@afrotok.com</td>
                              <td><a id="view-venmo-qr" class="one-em-font" href="#">Click to view QR code</a></td>
                            </tr>
                         
                          </table>
                        
                    </div><br>
                </div>
                <div>
                    <button id="card-open" class="clearbtn w100per uppercase">Donate via credit or debit card</button>
                </div>
            </section>
            <div id="card" class="display-hidden">

                <form onsubmit="return false" id="donate-form">
                    <fieldset>
                        <h2 class="sentence-case">Do you want your donation to be monhtly?</h2>
                        <p>(Cancel monthly donations any time by emailing hello@afrotok.com)</p>
                        <div class="row">
                            <div class="col-75">
                                <label> Yes
                                    <input required type="radio" name="plan" value="1">
                                </label>
                                <label>No
                                    <input required type="radio" name="plan" value="0">
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-75">
                                <select id="donate-amount" required name='amount'>
                                    <option disabled selected> Select a donation amount</option>
                                    <option value='27' label='$27.00'>$27.00</option>
                                    <option value='50' label='$50.00'>$50.00</option>
                                    <option value='100' label='$100.00'>$100.00</option>
                                    <option id="donate-other" value='other' label='Other'>Other</option>

                                </select>
                                <input id="other-amount" type="number" value="" placeholder="00.00" name="other-amount">
                            </div>
                        </div>
                    </fieldset>
                    <br> <br>

                    <fieldset>
                        <h2 class="sentence-case">Billing address</h2>

                        <div>

                            <div class="row">
                                <div class="col-75">
                                    @php $billing = "billing_";@endphp
                                    @include('includes.address-collection')
                                </div>
                            </div>
                        </div>
                        <div></div>
                    </fieldset>
                    <br> <br>
                    <fieldset>
                        <div>
                            <h2 class="sentence-case">Payment method</h2>

                        </div>
                        <div id="payment" class="">

                            <div id="card-container"></div>
                            <div class='sub-btns'>
                                <button class='button' id="card-button" data-type-total="1"
                                    type="button">&nbsp;DONATE</button>
                            </div>

                            <input type='hidden' id='route' value='/donate/submit'>
                </form>
                <div id="payment-status-container"></div>

                </fieldset>
            </div>
        </section>
        </div>
        <div>
            <section class="hide margin-top-6-em sticky">

        </div>
        </div>
        </section>
        </div>
    </main>
@endsection
