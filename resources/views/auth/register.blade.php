@extends('layouts.auth')

@section('content')
<h1>{{__(trans('login.register'))}}</h1>
<p class="account-subtitle">{{__(trans('login.go_to_dashboard'))}}</p>

<!-- Form -->
<form action="{{route('register')}}" method="POST">
	@csrf
	<div class="form-group">
		<input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="{{__(trans('singup.full_name'))}}">
	</div>
	<div class="form-group">
		<input class="form-control" name="email" type="text" value="{{old('email')}}" placeholder="{{__(trans('login.email')) }}">
	</div>
	<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="{{__(trans('login.password'))}}">
	</div>
	<div class="form-group">
		<input class="form-control" name="password_confirmation" type="password" placeholder="{{__(trans('singup.confirm_password'))}}">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-success btn-login btn-block" type="submit">{{__(trans('login.register'))}}</button>
	</div>
</form>
<!-- /Form -->
<div class="text-center dont-have">{{__(trans('singup.already_have_an_acount'))}}<a href="{{route('login')}}">{{__(trans('login.login'))}}</a></div>
<ul class="log-lang mt-1">					
	<li>
        <a class="nav-link" href="{{ route('lang', ['lang' => 'fr']) }}"><img src="{{ asset('assets/img/icons/fr.png')}}" title="{{__(trans('sidebar.french')) }}" alt="{{__(trans('sidebar.french')) }}"/></a>
    </li>
	|
    <li>
    	<a class="nav-link" href="{{ route('lang', ['lang' => 'en']) }}"><img src="{{ asset('assets/img/icons/gb.png') }}" title="{{__(trans('sidebar.english')) }}" alt="{{__(trans('sidebar.english')) }}"/></a>
    </li>
</ul>
@endsection


