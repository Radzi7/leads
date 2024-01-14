@extends('layouts.main')

@section('page.title', 'Просмотр')

@section('main.content')
    <x-title>
        {{ __('Данный текущей истории') }}

        <x-slot name="link">
            <a href="{{ route('histories') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>
    </x-title>
    <div>
        <h2 class="h4">
            Action : {{ $history->action }}
        </h2>

        <h2 class="h4">
            Lead status : {{ $lead }}
        </h2>

        <h2 class="h4">
            Detailed information : {{ $history->data }}
        </h2>
    </div>

@endsection
