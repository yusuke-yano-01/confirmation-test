@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>お問い合わせフォーム</h2>
  </div>
  <form class="form" action="/contactform/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="姓" />
          <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="名" />
        </div>
        <div class="form__error">
          @error('last_name')
          {{ $message }}
          @enderror
          @error('first_name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--radio">
          <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}> 男性
          <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性
          <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他
        </div>
        <div class="form__error">
          @error('gender')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="tel" name="tell" value="{{ old('tell') }}" />
        </div>
        <div class="form__error">
          @error('tell')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" value="{{ old('building') }}" />
        </div>
        <div class="form__error">
          @error('building')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容の種類</span>
      </div>
      <div class="form__group-content">
        <select name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
          @endforeach
        </select>
      </div>
      <div class="form__error">
        @error('category_id')
        {{ $message }}
        @enderror
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" rows="5">{{ old('detail') }}</textarea>
        </div>
        <div class="form__error">
          @error('detail')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面へ</button>
    </div>
  </form>
</div>
@endsection