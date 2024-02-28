@extends('layouts.content')

@section('page_title')
    Dashboard
@endsection

@section('link_bantuan')
    {{ route('bantuan.dashboard') }}
@endsection

@section('content')
    <h2 class="text-4xl font-semibold dark:text-white">Selamat datang,</h2>
    <h5 class="text-xl dark:text-white">{{ auth()->user()->nama }}</h5>
    <h5 class="text-xl dark:text-white">NIP {{ auth()->user()->nip }}</h5>
@endsection
