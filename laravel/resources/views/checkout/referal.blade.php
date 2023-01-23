@extends('layouts.checkout')
@section('title', 'Boxeon.com Referal Program')


@section('content')

    <main id="checkout-main">
        <span></span>
        <div id="refpro">
            <section id="checkout-content" class="margin-top-6-em max-width-1035 three-rows-grid">
                <div class="step-wrapper rounded-corners">
                 <h2 class="centered ginormous text-red">{{$user->given_name}}, final step!</h2>
                    <h2 class="centered center">Invite friends to get your 16 free meals + 3 surprise gifts.</h2>
                    <div>
                        <div class="div-horizontal-rule center"></div>
                        <h2 class="centered center kanit text-red">Your friends will also be given 16 free meals + 3 surprise gifts just for accepting your invitation.</h2>
                      <br>
                        <form action='/checkout/address' method='post'>
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-75">
                                    <h3 class="centered black-font center font-size-1-5-em">Invite a friend by email</h3>
                                   
                                   <input class="margin-auto centered font-size-1-5-em" name="" type="email" placeholder="Add friend's email">
                                   <input class="center margin-auto"  type='submit' value='INVITE FRIEND'>

                                </div>
                            </div>
                           
                        </form>
                        <div class="div-horizontal-rule center"></div>
                        <h3 class="centered black-font center font-size-1-5-em">More ways to invite friends</h3>
                        <br>
                        <form>
                            <h3 class="centered black-font center font-size-1-5-em">Copy and share link 
                            <input class='clipboard centered center w300px' type='text' value='https://boxeon.com/{{$user->id}}/accept'>
                        </h3>
                        </form>
                    </div>
                    <div></div>
                </div>
            </section>
        </div>
        <div>
        </div>
        </div>
        </section>
        </div>
    </main>
@endsection
