<x-card>
    <x-card-body>
        <h2 class="h6">
            <a href="{{ route('leads.show', $lead->id) }}">
                {{ $lead->number }}
            </a>
        </h2>
    </x-card-body>
</x-card>
