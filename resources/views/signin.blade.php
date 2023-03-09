@extends('layout.layout')

@section('title', 'Signin Page')

@section('content')


    <!-- Page Content -->
    <section class="contact-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="down-contact">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                        <h2>Send us a message</h2>
                                    </div>
                                    <div class="content">
                                        <form id="contact" action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-12 col-sm12 col-lg-12">
                                                    @include('components.alerts.error')
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input value="{{ old('email') }}" name="email" type="text"
                                                            id="email" placeholder="Your email" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="password" type="password" id="password"
                                                            placeholder="*********">
                                                    </fieldset>
                                                </div>

                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Sign
                                                            In</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
