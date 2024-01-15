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
    <section class="bg-gray-300 bg-[url('{{ asset('assets/if-bg.png') }}')] bg-center bg-no-repeat bg-blend-multiply">
        <div class="container mx-auto flex h-screen flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
            @livewire('login')
        </div>
    </section>
@endsection
