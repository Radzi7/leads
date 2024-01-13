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
{{--    @props(['lead' => null])--}}
    <x-form  action="{{ route('column.update', $lead->id) }}" method="put" :post="$lead">
        <div class="form-floating">{{ __('Колонка') }}
            <select class="form-select p-2 mb-2" name="status_select" id="status_select" aria-label="Floating label select example">
                @foreach($columns as $column)
                    <option value={{$column->id}} >{{ $column->name }}</option>
                @endforeach
            </select>
        </div>
        <x-button type="submit">
            {{ __('Изменить колонку') }}
        </x-button>
    </x-form>
@endsection
