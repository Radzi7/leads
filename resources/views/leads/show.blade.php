@extends('layouts.main')

@section('page.title', 'Просмотр')

@section('main.content')
    <x-title>
        {{ __('Просмотр лида') }}

        <x-slot name="link">
            <a href="{{ route('leads') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>

        <x-slot name="right" class="d-flex justify-content-evenly gap-2">
            <x-button-link href="{{ route('leads.edit', $lead->id) }}">
                {{ __('Изменить') }}
            </x-button-link>


        </x-slot>

        <div class="d-flex justify-content-evenly gap-2 ">
            <x-button-link href="{{ route('take.edit', $lead->id) }}">
                {{ __('Оператора') }}
            </x-button-link>

            <x-button-link href="{{ route('column.edit', $lead->id) }}">
                {{ __('Колонка') }}
            </x-button-link>

            <x-button-link href="{{ route('comment.edit', $lead->id) }}">
                {{ __('Комментарий') }}
            </x-button-link>
        </div>
    </x-title>
    <div>
        <h2 class="h4">
            number : {{ $lead->number }}
        </h2>

        <h2 class="h4">
            status : {{ $lead->status }}
        </h2>

        <h2 class="h4">
            comment : {{ $lead->comment }}
        </h2>
        <h2 class="h4">
            created_at : {{ $lead->created_at }}
        </h2>
        <h2 class="h4">
            @if($lead->lead_column_id==1)
                column : New lead
            @elseif($lead->lead_column_id==2)
                column : My list
            @elseif($lead->lead_column_id==3)
                column : Recall
            @elseif($lead->lead_column_id==4)
                column : Didn't pick up
            @elseif($lead->lead_column_id==5)
                column : Contacted
            @endif
        </h2>
        <h2 class="h4">
            @if($lead->operator_id==null)
                Operator has not yet been assigned.
            @else
                operator_id : {{ $lead->operator_id }}
            @endif
        </h2>
    </div>

@endsection
