<!-- User -->
@props([
    'strokeWidth' => 1
])

<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }}  fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{{ $strokeWidth }}" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
</svg>