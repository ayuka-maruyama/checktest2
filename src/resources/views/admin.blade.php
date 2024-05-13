@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
<form class="admin-form__logout" action="/logout" method="post">
    @csrf
    <input class="logout-btn" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="admin">
    <h2 class="admin__heading content__heading">Admin</h2>

    <!-- 検索フォーム -->
    <div class="admin__inner">
        <form class="search-form" action="/search" method="get">
        @csrf
            <input class="search-form__text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <div class="search-form__gender">
                <select name="gender" value="{{ request('gender') }}">
                    <option disabled selected>性別</option>
                    <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
                    <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
                    <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
                </select>
            </div>
            <div class="search-form__category">
                <select name="category_id" value="{{ request('category_id') }}">
                    <option disabled selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if( request('category_id')==$category->id) selected @endif>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="search-form__date">
                <input class="search-form__date-input" type="date" name="date" value="{{ request('date') }}" >
            </div>
            <div class="search-form__action-search">
                <input type="submit" value="検索" class="search-form__search-btn">
            </div>
            <div class="search-form__action-reset">
                <input type="submit" value="リセット" class="search-form__reset-btn">
            </div>
        </form>
    </div>

    <!-- エクスポート、ページネーション -->
    <div class="export-form">
        <form action="" method="post">
        @csrf
            <input class="export__btn btn" type="submit" value="エクスポート">
        </form>
        <!-- ページネーションについて記述 -->
        {{ $contacts->appends(request()->query())->links('vender.pagination.custom') }}
    </div>

    <!-- Contactsテーブルの内容表示 -->
    <table class="admin-table">
        <tr class="admin__row">
            <th class="admin__label">お名前</th>
            <th class="admin__label">性別</th>
            <th class="admin__label">メールアドレス</th>
            <th class="admin__label">お問い合わせの種類</th>
            <th class="admin__label"></th>
        </tr>
        @foreach($contacts as $contact)
        <tr class="admin__row-data">
            <td class="admin__data">
                {{ $contact->first_name }}&ensp;{{ $contact->last_name }}
            </td>

            <td class="admin__data">
                @if( $contact->gender ==1 )
                男性
                @elseif( $contact->gender ==2 )
                女性
                @else
                その他
                @endif
            </td>
            <td class="admin__data">
                {{ $contact->email }}
            </td>
            <td class="admin__data">
                {{ $contact->category->content }}
            </td>
            <td class="admin__data">
                <a href="" class="admin__data-link">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>

</div>


@endsection
