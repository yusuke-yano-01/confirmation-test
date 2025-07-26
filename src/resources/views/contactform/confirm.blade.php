@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contactform.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>お問い合わせ内容確認</h2>
  </div>
  <form class="form" action="/contact/thanks" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            {{ $contact['first_name'] }} {{ $contact['last_name'] }}
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            {{ $contact['gender'] == 1 ? '男性' : '女性' }}
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            {{ $contact['email'] }}
            <input type="hidden" name="email" value="{{ $contact['email'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            {{ $contact['tell'] }}
            <input type="hidden" name="tell" value="{{ $contact['tell'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            {{ $contact['address'] }}
            <input type="hidden" name="address" value="{{ $contact['address'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            {{ $contact['building'] ?? '' }}
            <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容の種類</th>
          <td class="confirm-table__text">
            {{ $contact['category_name'] }}
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            {{ $contact['detail'] }}
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
  </form>
</div>
@endsection