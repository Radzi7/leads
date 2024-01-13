@extends('layouts.main')

@section('page.title', 'Редактировать лид')

@section('main.content')
    <x-title>
        {{ __('Изменить колонку') }}

        <x-slot name="link">
            <a href="{{ route('leads.show', $lead->id) }}">
                {{ __('Назад') }}
            </a>
        </x-slot>
    </x-title>
    <x-form  action="{{ route('comment.update', $lead->id) }}" method="put" :post="$lead">
        <x-form-item>
            <x-label required>{{ __('Комментарий к лиду') }}</x-label>
            <x-input name="comment" value="{{ $lead?->comment }}" placeholder="any text" />
            <x-error name="comment" />
        </x-form-item>
        <x-button type="submit">
            {{ __('Изменить колонку') }}
        </x-button>
    </x-form>
@endsection
