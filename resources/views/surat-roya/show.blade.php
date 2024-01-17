@extends('layouts.content')

@section('page_title')
    Detail Surat Roya
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('show-surat-roya-livewire', ['id' => $id])
@endsection
