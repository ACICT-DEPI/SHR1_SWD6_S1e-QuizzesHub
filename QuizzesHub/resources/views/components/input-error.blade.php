@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1 ']) }}>
        @foreach ((array) $messages as $message)
            <li ><span style="--tw-text-opacity: 1;
    color: rgb(220 38 38 / var(--tw-text-opacity)) /* #dc2626 */;">{{ $message }}</span></li>
        @endforeach
    </ul>
@endif
