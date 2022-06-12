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
                        <span>ENTER EMAIL TO RESET PASSWORD</span>
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

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-1">
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

                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="feather icon-unlock"></i> 
                                {{ __('Send Password Reset Link') }}
                            </button>
                            <a class="text-center" href="/login">Back to Login</a>

                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@include('includes.authentication.login-js')