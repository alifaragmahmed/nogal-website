@extends('website.app')
@section('content')

    <!-- ========================  Main header ======================== -->

      <section class="banner" style="background-image:url(website/assets/images/about.png)">
            <header>
                <div class="container text-center">
                    <h2 class="h2 title"> {{__('Customer page')}}</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href=""><span class="icon icon-home"></span></a></li>
                        <li><a class="active" href="login.html">{{__('Login & Register')}}</a></li>
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Login & register ======================== -->

        <section class="login-wrapper login-wrapper-page">
            <div class="container">

                <header class="hidden">
                    <h3 class="h3 title"> {{__('Sign in')}}</h3>
                </header>

                <div class="row">

                    <!-- === left content === -->

                    <div class="col-md-6 col-md-offset-3">

                        <!-- === login-wrapper === -->

                        <div class="login-wrapper">

                            <div class="white-block">

                                <!--signin-->

                                <div class="login-block login-block-signin">

                                    <div class="h4"> {{__('Sign in')}}<a href="javascript:void(0);" class="btn btn-main btn-xs btn-register pull-right">  {{__('create an account')}}</a></div>

                                    <hr />

                                    <div class="row">

                         <form action="{{route('website.login')}}" method="POST">
                        {{ csrf_field() }}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" value="" name="email" id="email" class="form-control" placeholder=" {{__('Email')}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" value="" id="password" name="password" class="form-control" placeholder=" {{__('Password')}}">
                                            </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <span class="checkbox">
                                                <input type="checkbox" id="checkBoxId3">
                                                <label for="checkBoxId3"> {{__('Remember me')}}</label>
                                            </span>
                                        </div>

                                        <div class="col-xs-6 text-right">
                                        <button type="submit" class="btn w3-blue btn-block btn-flat"> {{__('Login')}}</button>
                                        </div>
                    </form> 

                                       
                                    </div>
                                </div> <!--/signin-->
                                <!--signup-->

                                <div class="login-block login-block-signup">

                                    <div class="h4">  {{__('Register now')}}<a href="javascript:void(0);" class="btn btn-main btn-xs btn-login pull-right"> {{__('Log in')}}</a></div>

                                    <hr />

                                    <div class="row">



                         <form action="{{route('website.register')}}" method="POST">
                        {{ csrf_field() }}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" value="" name="name" id="name" class="form-control" placeholder="  {{__(' name: *')}}">
                                            </div>
                                        </div>

                                       

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" value="" name="email" id="email" class="form-control" placeholder=" {{__('User Email')}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" value="" id="password" name="password" class="form-control" placeholder=" {{__('Password')}}">
                                            </div>
                                        </div>

                                      
                                        <div class="col-md-12"> <button type="submit" class="btn w3-blue btn-block btn-flat">  {{__('Create Account')}}</button>
                                        </div>
                    </form> 

                                      

                                       


                                    </div>
                                </div> <!--/signup-->
                            </div>
                        </div> <!--/login-wrapper-->
                    </div> <!--/col-md-6-->

                </div>

            </div>
        </section>

@endsection