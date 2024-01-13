@extends('layouts.main')

@section('page.title', 'Все лиды')

@section('main.content')
    <x-title>
        {{ __('Все лиды') }}

        <x-slot name="right">
            <x-button-link href="{{ route('leads.create') }}">
                {{ __('Создать') }}
            </x-button-link>
        </x-slot>
    </x-title>

    @if(empty($leads))
        {{ __('Нет ни одного лида.') }}
    @else
        <div class="container text-center ">
            <div class="d-flex flex-row p-2 justify-content-evenly bd-highlight mb-3">
                @foreach($lead_columns as $column)
                <div class="border border-dark p-2 ">
                    <div class="fw-bold">
                        {{ $column->name }}
                    </div>

                    @foreach($leads as $lead)
                        @if($column->id ==$lead->lead_column_id)
                        <div class="mb-3 p-2 border border-dark">
                                <a href="{{ route('leads.show', $lead->id) }}">
                                    {{ $lead->number }}
                                </a>
                        </div>
                        @endif
                  @endforeach
                </div>
                @endforeach
            </div>
        </div>

{{--        {{ $leads->links() }}--}}
    @endif
@endsection
