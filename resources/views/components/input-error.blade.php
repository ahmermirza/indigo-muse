@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <p class="text-danger">
            {{ $message }}
        </p>
    @endforeach
@endif
