@extends('layouts.content')

@section('page_title')
    Dashboard
@endsection

@section('content')
    <h2 class="text-4xl font-semibold dark:text-white">Selamat datang,</h2>
    <h5 class="text-xl dark:text-white">{{ auth()->user()->nama }}</h5>
@endsection
