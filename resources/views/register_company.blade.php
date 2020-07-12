@extends('layouts.app')

@section('content')
<!-- CONTAINER OPEN -->
<div class="container-login100">
    
    <div class="wrap-login100 p-6">
        @if (count($errors) > 0)     
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif
        <form class="login100-form validate-form" method="POST" action="{{ route('postregistercompany') }}">
            @csrf
            <span class="login100-form-title">
                <i class="fa fa-building-o mr-2" aria-hidden="true"> </i>Company Registration
            </span>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="company_name" placeholder="Company Name" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                   <i class="fa fa-building-o" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="city" placeholder="city" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="phone" placeholder="Phone" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
            </div>
            <label class="custom-control custom-checkbox mt-4">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
            </label>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn btn-primary">
                    Register
                </button>
            </div>
            <div class="text-center pt-3">
                <p class="text-dark mb-0">Already have account?<a href="{{ route('login') }}" class="text-primary ml-1">Sign In</a></p>
            </div>
        </form>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
