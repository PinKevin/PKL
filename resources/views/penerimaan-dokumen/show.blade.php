@extends('layouts.content')

@section('page_title')
    Dokumen
@endsection

@section('link_bantuan')
    {{ route('bantuan.penerimaan') }}
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

                window.scrollTo(0, 0);
            });

            Livewire.on('closeEditModal', (event) => {
                let updateButton = $('#close-edit-modal');
                updateButton.click();

                window.scrollTo(0, 0);
            });

            Livewire.on('scrollToTop', (event) => {
                window.scrollTo(0, 0);
            });
        });
    </script>
@endpush

@section('content')
    @livewire('penerimaan-dokumen-livewire', ['no_debitur' => $no_debitur])
@endsection
