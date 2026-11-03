@props(['align' => 'left'])

@php
    $alignment = match($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

<th {{ $attributes->merge(['class' => "px-6 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 {$alignment}"]) }}>
    {{ $slot }}
</th>