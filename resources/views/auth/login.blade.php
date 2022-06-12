@extends('layouts.blank')

@include('includes.authentication.login-css')

@section('content')
<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1">
                            {{env('APP_NAME')}}
                            <!-- <img src="{{asset('assets/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo" /> -->
                        </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                        <span>Login with {{env('APP_NAME')}}</span>
                    </h6>
                </div>
               <!-- errors -->
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
                @endforeach
                @endif
                <!-- errors -->

                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="user-name" placeholder="Email" name="email" required />
                                <div class="form-control-position">
                                    <i class="feather icon-user"></i>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="user-password" placeholder="Enter Password" required />
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                    <fieldset>
                                        <input type="checkbox" name="remember" id="remember-me" class="chk-remember" />
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12 text-center text-sm-right">
                                    <a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="feather icon-unlock"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@include('includes.authentication.login-js')