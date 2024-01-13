@props(['lead' => null])

<x-form {{ $attributes }}>
    <x-form-item>
        <x-label required>{{ __('Имя') }}</x-label>
        <x-input name="name" value="{{ $lead?->name }}" placeholder="John" />
        <x-error name="name" />
    </x-form-item>
    <x-form-item>
        <x-label required>{{ __('Номер телефона') }}</x-label>
        <x-input name="number" value="{{ $lead?->number }}" placeholder="+998987654321" />
        <x-error name="number" />
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Комментарий к лиды') }}</x-label>
        <x-input name="comment" value="{{ $lead?->comment }}" placeholder="any text" />
        <x-error name="comment" />
    </x-form-item>
    {{ $slot }}
</x-form>
