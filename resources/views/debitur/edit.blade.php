@extends('layouts.content')

@section('page_title')
    Edit Surat Roya
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('edit-debitur-livewire', ['id' => $id])
@endsection
