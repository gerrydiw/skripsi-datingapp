@extends('layouts.app')
@section('content')
<div class="login-box">
    {{-- <div class="login-logo">
        <div class="login-logo">
            <a href="#">
                <b>MATCHER</b>
            </a>
        </div>
    </div> --}}
    <div class="card card-outline card-warning">
        <div class="card-header text-center">
                {{-- <img src="{{asset('images/1656740327135.jpg')}}" alt="Matcher Logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="50"> --}}
                <a href="../../index2.html" class="h1">MATCHER</a>
            </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            @if(\Session::has('message'))
                <p class="alert alert-info">
                    {{ \Session::get('message') }}
                </p>
            @endif
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('global.login_email') }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('global.login_password') }}" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <input type="checkbox" name="remember"> {{ trans('global.remember_me') }}
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-warning btn-block">{{ trans('global.login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



            {{-- <p class="mb-1">
                <a class="" href="{{ route('password.request') }}">
                    {{ trans('global.forgot_password') }}
                </a>
            </p> --}}
            <p class="mb-0">
                <a href="/register" class="text-center">Register a new membership</a>
              </p>
            <p class="mb-1">

            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection