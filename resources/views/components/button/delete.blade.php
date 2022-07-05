@props(['resource', 'id'])

<form method="DELETE" {{ $attributes }}>
    @csrf
    <x-button type="submit" class="bg-red-500">
        {{ $slot }}
    </x-button>
</form>
