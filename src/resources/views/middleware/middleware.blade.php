@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
  <h1>{{ $content ?? 'ミドルウェアテスト' }}</h1>
  <form action="/middleware" method="POST">
    @csrf
    <input type="text" name="content">
    <input type="submit">
  </form>
@endsection