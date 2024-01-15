@extends('layouts.main')

@section('page_title')
    Login
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('body')
    <section class="container relative bg-[url('/public/img/gedung2.jpeg')] bg-cover bg-center">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div
            class="container mx-auto flex h-screen flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0 relative">
            @livewire('login')
        </div>
    </section>
@endsection
