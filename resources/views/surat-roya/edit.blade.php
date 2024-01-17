@extends('layouts.content')

@section('page_title')
    Tambah Surat Roya
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('edit-surat-roya-livewire', ['id' => $id])
@endsection
