@extends('layouts.content')

@section('page_title')
    Tambah Debitur
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('create-debitur-livewire')
@endsection
