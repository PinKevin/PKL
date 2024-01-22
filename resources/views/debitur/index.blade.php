@extends('layouts.content')

@section('page_title')
    Debitur
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('scrollToTop', (event) => {
                window.scrollTo(0, 0);
            });
        });
    </script>
@endpush

@section('content')
    @livewire('debitur-livewire')
@endsection
