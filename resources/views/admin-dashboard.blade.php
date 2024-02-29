@extends('layouts.admin-content')

@section('page_title')
    Admin Dashboard
@endsection

{{-- @section('link_bantuan')
    {{ route('bantuan.dashboard') }}
@endsection --}}

@section('content')
    <h2 class="text-4xl font-semibold dark:text-white">Selamat datang,</h2>
    <h3 class="text-2xl dark:text-white">Admin {{ auth()->user()->nama }}</h3>
    <h5 class="text-lg dark:text-white">NIP. {{ auth()->user()->nip }}</h5>
@endsection
