@extends('layouts.app-no-header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contactform.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
      <div class="thanks__heading">
        <h2>お問い合わせありがとうございました</h2>
      </div>
      <div class="thanks__content-button">
        <form action="/contactform" method="get">
          <button class="form__button-submit" type="submit">HOME</button>
        </form>
      </div>
    </div>
@endsection