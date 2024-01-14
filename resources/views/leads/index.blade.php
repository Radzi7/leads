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
                <div class="border border-dark border-4 p-2 m-1">
                    <div class="fw-bold mb-2 ">
                        {{ $column->name }}
                    </div>
                    <ol style="width: 215px" class=" p-3 list-group list-group-number">
                    @foreach($leads as $lead)
                        @if($column->id ==$lead->lead_column_id)
{{--                        <li>--}}
                                <div class="d-flex justify-content-between gap-2 mb-3 ">
                                <li><b>
                                    <a href="{{ route('leads.show', $lead->id) }}">
                                        {{ $lead->number }}
                                    </a>
                                </b>
                                </li>
                            <form method="post" action="{{ route('leads.delete', $lead) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">{{ __('Удалить') }}</button><br>
                            </form>
                        </div>
{{--                        </li>--}}
                            @endif
                  @endforeach

                    </ol>
                </div>
                @endforeach
            </div>
        </div>

{{--        {{ $leads->links() }}--}}
    @endif
@endsection
