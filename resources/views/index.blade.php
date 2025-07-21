@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <p class="text-xl mb-4">{{ __('messages.welcome') }}</p>

        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            {{ __('messages.analyze_logs') }}
        </a>
    </div>
@endsection
