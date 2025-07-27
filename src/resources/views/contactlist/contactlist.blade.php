@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/contactlist.css') }}">
@endsection

@section('content')
<div class="contactlist__content">
  <div class="contactlist__heading">
    <h2>お問い合わせ一覧</h2>
  </div>
    
    <!-- 検索フォーム -->
    <form class="form" action="/contactlist/search" method="post">
      @csrf  
      <div class="form__group">
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ session('reset') ? '' : old('email', request('email')) }}" placeholder="メールアドレス入力" />
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-content">
          <div class="form__input--select">
            <select name="gender">
              <option value="">性別</option>
              <option value="1" {{ session('reset') ? '' : (old('gender', request('gender')) == '1' ? 'selected' : '') }}>男性</option>
              <option value="2" {{ session('reset') ? '' : (old('gender', request('gender')) == '2' ? 'selected' : '') }}>女性</option>
              <option value="3" {{ session('reset') ? '' : (old('gender', request('gender')) == '3' ? 'selected' : '') }}>その他</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-content">
            <div class="form__input--select">
              <select name="category_id">
                <option value="">お問い合わせ内容の種類を選択</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ session('reset') ? '' : (old('category_id', request('category_id')) == $category->id ? 'selected' : '') }}>{{ $category->content }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-content">
          <div class="form__input--date">
            <input type="date" name="created_at" value="{{ session('reset') ? '' : old('created_at', request('created_at')) }}" id="date-picker">
            <input type="hidden" name="formatted_date" id="formatted-date" value="{{ session('reset') ? '' : old('formatted_date', request('formatted_date')) }}">
          </div>
        </div>
      </div>
      <!-- 検索ボタン -->
      <div class="search-form__button">
        <button class="search-form__button-submit" type="submit">検索</button>
      </div>
      <!-- リセットボタン -->
      <div class="reset-form__button">
        <form class="reset-form" action="/contactlist" method="post">
          @csrf
          <button class="reset-form__button-submit" type="submit">リセット</button>
        </form>
      </div>
    </form>
    
    @if(isset($contacts) && count($contacts) > 0)
      <!-- お問い合わせ一覧テーブル -->
      <div class="contactlist-table">
        <table class="contactlist-table__inner">
          <!-- テーブルヘッダー -->
          <tr class="contactlist-table__row">
            <th class="contactlist-table__header">お名前</th>
            <th class="contactlist-table__header">性別</th>
            <th class="contactlist-table__header">お問い合わせ内容の種類</th>
            <th class="contactlist-table__header"></th>
          </tr>
          <!-- お問い合わせアイテムの繰り返し表示 -->
          @foreach ($contacts as $contact)
            <tr class="contactlist-table__row">
              <!-- お問い合わせ内容とカテゴリ表示エリア -->
              <td class="contactlist-table__item">
                <!-- 更新フォーム -->
                <div class="update-form__item">
                  <!-- カテゴリ表示 -->
                  <p class="update-form__item-p">{{ $contact->last_name }} {{ $contact->first_name }}</p>
                </div>
              </td>
              <td class="contactlist-table__item">
                <!-- 更新フォーム -->
                <div class="update-form__item">
                  <!-- カテゴリ表示 -->
                  <p class="update-form__item-p">
                    @if($contact->gender == 1)
                      男性
                    @elseif($contact->gender == 2)
                      女性
                    @elseif($contact->gender == 3)
                      その他
                    @endif
                  </p>
                </div>
              </td>
              <td class="contactlist-table__item">
                <!-- 更新フォーム -->
                <div class="update-form__item">
                  <!-- カテゴリ表示 -->
                  <p class="update-form__item-p">{{$contact->category_name()}}</p>
                </div>
              </td>
              <!-- 詳細ボタンエリア -->
              <td class="contactlist-table__item">
                <form class="update-form" action="/contactlist/update" method="POST">
                  @method('PATCH')
                  @csrf
                  <input type="hidden" name="id" value="{{ $contact->id }}">
                  <div class="update-form__button">
                    <button class="update-form__button-submit" type="submit">詳細</button>
                  </div>
                </form>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    @endif
</div>
@endsection