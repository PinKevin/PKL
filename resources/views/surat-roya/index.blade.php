@extends('layouts.content')

@section('page_title')
    Surat Roya
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('surat-roya-livewire')
@endsection
