@extends('layouts.home')
@section('title', 'AfroTok - Waiting List')
@section('content')
    <main>
        <section id="left-aside"></section>
        @if (session()->has('message'))
            <dialog class="alert">
                <p class='centered'> {{ session()->get('message') }}</p>
            </dialog>
        @endif
        <aside id="panel" class="card  maxw1035 margin-top-4-em">
            <div id="module">
                <span></span>
                <div class="masthead-forms">
                    <div class="row">
                        <div class="col-75">
                            <h2 class="text-black">Request invitation to join</h2>
                            <p>Please provide us with enough information to verify your identity.</p>
                        </div>
                    </div>
                    <form id='form-partner-apply' action="/apply/wait" method="post">
                        <fieldset>

                            <select required name='purpose'>
                                <option disabled selected> Select reason for joining</option>
                                <option value='CR' label='Create on the app'>Create on the app</option>
                                <option value='US' label='Use the app'>Use the app</option>
                                <option value='DEV' label='Develop the app'>Develop the app</option>

                            </select>
                        </fieldset>
                        <br>
                        <fieldset>
                            @include('includes.address-collection')
                        </fieldset>
                        <br>
                        <fieldset>
                            <input name='phone' type='tel' required value='' placeHolder='Mobile number' />
                            <input name='email' type='email' required value='' placeHolder='Primary Email' />
                        </fieldset>

                        <br>
                        <input type="submit" value="CONTINUE">
                    </form>
                </div>
        </aside>
        <section id="right-aside"></section>
    </main>
@endsection
