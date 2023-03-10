@extends('layouts.checkout')
@section('title', 'Afrotok Checkout')
@section('content')
    <main id="checkout-main" class="margin-auto margin-top-4-em">
        <span></span>
        <div>
            <section id="checkout-content" class=" max-width-1035 three-rows-grid">
     
                <div class="card step-wrapper">
                    <h2>1.&nbsp;&nbsp;&nbsp;Shipping address</h2>
                    <p><span data-type-id="shipping-address" class="preview">{{ $address->address_line_1 ?? 'Enter your shipping address to continue.'}}</span></p>
                    <button data-type-id="shipping-address" class="button edit-btn">EDIT</button>
                    <div>
                        <form onsubmit="return false"  id="shipping-address" class="display-none-unimportant">
                            <div class="row">
                                <div class="col-75">
                                    @include('includes.address-collection')
                                    <p>Are your billing and shipping address the same?</p>
                                    <label> Yes
                                    <input required type="radio" name="same" value="1">
                                    </label>
                                    <label>No
                                    <input required type="radio" name="same" value="0">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-75">
                                    <input type='submit' value='CONTINUE'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div></div>
                </div>
                <div class="card step-wrapper">
                    <h2>2.&nbsp;&nbsp;&nbsp;Billing address</h2>
                    <p><span data-type-id="billing-address" class="preview">{{ $address->billing_address_line_1 ?? 'Enter the billing address for your payment method.'}}</span></p>
                    <button data-type-id="billing-address" class="button edit-btn">EDIT</button>
                    <div>
                        <form onsubmit="return false" id="billing-address" class="display-none-unimportant">
                            <div class="row">
                                <div class="col-75">
                                    @php $billing = "billing_";@endphp
                                    @include('includes.address-collection')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-75">
                                    <input type='submit' value='CONTINUE'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div></div>
                </div>
                <div class="card step-wrapper">
                    <div>
                        <h2>3.&nbsp;&nbsp;&nbsp;Payment method</h2>
                        <p><span data-type-id="payment" class="preview">Save your card info to place your order.</span></p>
                        <button data-type-id="payment" class="button edit-btn">EDIT</button>
                    </div>
                    <div id="payment" class="display-none-unimportant">
                        <form onsubmit="return false">
                            <div id="card-container"></div>
                            <div class='sub-btns'>
                                <button class='button' id="card-button" data-type-total="1"
                                    type="button">&nbsp;SAVE</button>
                            </div>

                            <input type='hidden' id='route' value='/checkout/create/card'>
                        </form>
                        <div id="payment-status-container"></div>
                    </div>
                    <div></div>
                </div>
                <div id="m-checkout-summary" class="card step-wrapper">
                    <div  class="card-white-bg w100per m-checkout-summary">
                       <div class="show"> <h2 class="text-red margin-top-zero margin-bottom-zero">Order total:&nbsp;&nbsp;<span class="checkout-total"></span></h2><p>(Tax & shipping included)</p><br></div>

                        <form onsubmit="return false"  class="place-order">
                            <input type="submit" class="yellowbtn" value="Place your order">
                        </form>
                        <div>
                            <h2 class="hide text-red margin-top-zero margin-bottom-zero">Order total:&nbsp;&nbsp;<span class="checkout-total"></span></h2>
                          
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div>
            <section class="hide margin-top-6-em sticky">
                <div id="order-summary" class="card-white-bg">
                    <form onsubmit="return false" class="place-order">
                        <input type="submit" class="yellowbtn" value="Place your order">
                    </form>
                    <p class="one-em-font move-up centered">By placing your order, you agree to Boxeon's <a href="/privacy"
                            class="one-em-font underline primary-color">Privacy Policy</a> and <a href="/terms"
                            class="one-em-font underline primary-color">Terms of Use</a></p>
                    <h2>Order Summary</h2>
                    <div>
                        <div class="two-col-grid">
                            <p>item(s):</p>
                            <p>{{ count($cart) }}</p>
                        </div>
                        <div class="two-col-grid">
                            <p>Shipping:</p>
                            <div>
                                <p>$0</p>
                                <hr>
                            </div>
                        </div>
                        <div class="two-col-grid">
                            <p>Total:</p>
                            <p class="cart-total"></p>
                        </div>
                        <hr>
                        <div class="two-col-grid">
                            <h2 class="text-red">Order total:</h2>
                            <h2 class="text-red checkout-total"></h2>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        </section>
        </div>
    </main>
@endsection
