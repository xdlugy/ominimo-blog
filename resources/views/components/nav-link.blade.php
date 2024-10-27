@props(['active' => false])
@props(['type' => false])

@if($type)

<button class="{{ $active ? 'current' : '' }}">
    {{ $slot }}
</button>

@else

<a class="{{ $active ? 'current' : '' }}" {{ $attributes }} aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>

@endif