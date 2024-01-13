{{--@extends('layouts.main')--}}

{{--@section('page.title', 'Создать пост')--}}

{{--@section('main.content')--}}
    <x-title>
        {{ __('Добавить лид') }}

        <x-slot name="link">
            <a href="{{ route('leads') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{ route('leads.store') }}" method="post">
        <x-button type="submit">
            {{ __('Добавить') }}
        </x-button>
    </x-post.form>
{{--@endsection--}}
