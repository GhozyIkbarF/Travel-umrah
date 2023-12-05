@props(['messages'])

@error($attributes->get('for'))
    <div {{ $attributes->merge(['class' => 'text-red-500']) }}>
        {{ $messages }}
    </div>
@enderror
