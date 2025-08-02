@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contactform.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>
  <form class="form" action="/contactform/thanks" method="post" id="submit-form">
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
            @if($contact['gender'] == 1)
              男性
            @elseif($contact['gender'] == 2)
              女性
            @elseif($contact['gender'] == 3)
              その他
            @endif
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
  </form>
  
  <div class="form__buttons">
    <div class="form__button">
      <button class="form__button-submit" type="submit" form="submit-form">送信</button>
    </div>
    <div class="form__button">
      <form action="/contactform/back" method="post" style="display: inline;">
        @csrf
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
        <input type="hidden" name="tell" value="{{ $contact['tell'] }}" />
        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
        <input type="hidden" name="building" value="{{ $contact['building'] ?? '' }}" />
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
        <button class="form__button-submit form__button-back" type="submit">戻る</button>
      </form>
    </div>
  </div>
</div>
@endsection