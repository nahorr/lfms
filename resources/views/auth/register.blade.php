@extends('layouts.app')

@section('content')
<!-- CONTAINER OPEN -->
<div class="container-login100">

    
    <div class="wrap-login100 p-6"> 
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
         @endif

        <span class="wrap-login100 p-6">@include('flash::message')</span>
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title">
                <i class="fa fa-user mr-2" aria-hidden="true"></i>User Registration
            </span>
            <input type="hidden" name="company_id" value="{{ $company->id }}">
            <div class="wrap-input100 validate-input">
                <input id="name" type="text" class="input100 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                   <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="wrap-input100 validate-input">
                <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="wrap-input100 validate-input">
                <input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input">
                <input id="password-confirm" type="password" class="input100 form-control" name="password_confirmation" required placeholder="Confirm Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
