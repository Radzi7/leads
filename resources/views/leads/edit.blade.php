@extends('layouts.main')

@section('page.title', 'Редактировать лид')

@section('main.content')
    <x-title>
        {{ __('Редактировать лид') }}

        <x-slot name="link">
            <a href="{{ route('leads.show', $lead->id) }}">
                {{ __('Назад') }}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{ route('leads.update', $lead->id) }}" method="put" :post="$lead">
        <div class="form-floating">Column
            <select class="form-select p-2 mb-2" name="status_select" id="status_select" aria-label="Floating label select example">
                @foreach($lead_columns as $column)
                    <option value={{$column->id}} >{{ $column->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-floating">{{ __('Оператор') }}
            <select class="form-select p-2 mb-2" name="status_select" id="status_select" aria-label="Floating label select example">
                @foreach($operators as $operator)
                    <option value={{$operator->id}} >{{ $operator->name }}</option>
                @endforeach
            </select>
        </div>
        <x-button type="submit">
            {{ __('Сохранить') }}
        </x-button>

    </x-post.form>
@endsection
