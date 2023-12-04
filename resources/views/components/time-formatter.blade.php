@props([
    'time'
])

<span {{ $attributes->merge(['class' => 'text-xs text-gray-500']) }}>{{ \Carbon\Carbon::parse($time)->diffForHumans() }}</span>
