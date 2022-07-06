@props(['resource', 'id'])

<form method="POST" {{ $attributes }}>
    @csrf
    @method('DELETE')
    <x-button type="submit" class="bg-red-500">
        {{ $slot }}
    </x-button>
</form>
