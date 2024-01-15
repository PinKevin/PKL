@extends('layouts.content')

@section('page_title')
    Berkas
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('berkas-livewire')
@endsection
