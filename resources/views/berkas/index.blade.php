@extends('layouts.content')

@section('page_title')
    Berkas
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeCreateModal', (event) => {
                let createButton = $('#close-create-modal');
                createButton.click();
            });

            Livewire.on('closeShowModal', (event) => {
                let showButton = $('#close-show-modal');
                showButton.click();
            });

            Livewire.on('closeEditModal', (event) => {
                let updateButton = $('#close-edit-modal');
                updateButton.click();
            });
        });
    </script>
@endpush

@section('content')
    @livewire('berkas-livewire')
@endsection
