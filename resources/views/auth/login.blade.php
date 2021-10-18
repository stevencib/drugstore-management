@extends('layouts.auth')

@section('content')
<h1>{{__(trans('login.login'))}}</h1>
<p class="account-subtitle">{{__(trans('login.go_to_dashboard'))}}</p>
@if (session('login_error'))
<x-alerts.danger :error="session('login_error')" />
@endif
<!-- Form -->
<form action="{{route('login')}}" method="post">
	@csrf
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email">
	</div>
	<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Password">
	</div>
	<div class="form-group">
		<button class="btn btn-success btn-login btn-block" type="submit">{{__(trans('login.login')) }}</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center forgotpass"><a href="{{route('forgot-password')}}">{{__(trans('login.forgot_password'))}}</a></div>

<div class="text-center dont-have">{{__(trans('login.dont_have_an_account'))}}<a href="{{route('register')}}">{{__(trans('login.register'))}}</a></div>
@endsection

