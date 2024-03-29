@extends('layouts.admin-content')

@section('page_title')
    Edit Role
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('edit-hak-akses-livewire', ['id' => $id])
@endsection
