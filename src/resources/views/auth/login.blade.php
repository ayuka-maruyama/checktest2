@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('header')
<a class="login-header__link" href="/register">register</a>
@endsection

@section('content')
<div class="login-form">
    <h2 class="login-form__heading content__heading">login</h2>
    <div class="login-form__area">
        <form action="/login" method="post">
        @csrf
            <div class="login-form__area-inner">
                <lable class="login-form__label" for="email">メールアドレス</lable>
                <input type="mail" class="login-form__input" id="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
                <p class="login-form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form__area-inner">
                <lable class="login-form__label">パスワード</lable>
                <input type="password" class="login-form__input" id="password" name="password" placeholder="例：coachtech1106">
                <p class="login-form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="login-form__btn">
                <input class="login-form__btn-submit" type="submit" value="ログイン">
            </div>
        </form>
    </div>
</div>
@endsection