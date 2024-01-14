@extends('layouts.main')

@section('page.title', 'Все лиды')

@section('main.content')
    <x-title>
        {{ __('Вся история лидов') }}
    </x-title>

    @if(empty($histories))
        {{ __('История лидов пусто.') }}
    @else
        <div class="container text-center ">
            <div class="d-flex flex-row p-2 justify-content-evenly bd-highlight mb-3">
                <ol style="width: 215px" class=" p-3 list-group list-group-number border border-dark border-4">
                    @foreach($histories as $history)
                            <div class="p-3">
                                <li>
                                    <b class="d-flex justify-content-between gap-2 mb-3 ">
                                        <a href="{{ route('histories.show', $history->id) }}">
                                            Action : {{  $history->action }}<br>
                                            Lead_id: {{  $history->lead_id }}
                                        </a>
                                    </b>
                                </li>
                            </div>
                    @endforeach
                </ol>
            </div>
        </div>
    @endif
@endsection
