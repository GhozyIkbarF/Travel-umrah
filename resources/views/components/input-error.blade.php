@props(['messages'])

@error($attributes->get('for'))
    <div {{ $attributes->merge(['class' => 'text-red-500']) }}>
        @if(is_array($messages))
            @foreach ($messages as $message)
                <p>{{ $message }}</p>
            @endforeach
        @else
            <p>{{ $messages }}</p>
        @endif
    </div>
@enderror
