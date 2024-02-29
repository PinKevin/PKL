@extends('layouts.admin-content')

@section('page_title')
    Kelola Akun
@endsection

{{-- @section('link_bantuan')
    {{ route('bantuan.dashboard') }}
@endsection --}}

@section('content')
    @livewire('kelola-akun-livewire')
@endsection
