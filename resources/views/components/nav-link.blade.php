@props(['active' => false])
<a class="{{ $active ? 'current' : '' }}" {{ $attributes }} aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>