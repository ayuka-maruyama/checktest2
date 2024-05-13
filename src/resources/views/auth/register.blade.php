@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('header')
<a class="register-header__link" href="/login">login</a>
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__heading content__heading">Register</h2>
    <div class="register-form__area">
        <form action="/register" method="post">
        @csrf
            <div class="register-form__area-inner">
                <lable class="register-form__label" for="name">お名前</lable>
                <input type="text" class="register-form__input" id="name" name="name" value="{{ old('name') }}" placeholder="例：山田 太郎">
                <p class="register-form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__area-inner">
                <lable class="register-form__label" for="email">メールアドレス</lable>
                <input type="mail" class="register-form__input" id="email" name="email" value="{{ old('email') }}"  placeholder="例：test@example.com">
                <p class="register-form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__area-inner">
                <lable class="register-form__label">パスワード</lable>
                <input type="password" class="register-form__input" id="password" name="password" placeholder="例：coachtech1106">
                <p class="register-form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__btn">
                <input class="register-form__btn-submit" type="submit" value="登録">
            </div>
        </form>
    </div>
</div>
@endsection