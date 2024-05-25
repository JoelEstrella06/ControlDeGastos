@props(['value','required'=>false])

<label {{ $attributes->merge(['class' => '']) }}>
    @isset($value)
        <span class="block font-medium text-sm {{$required?'before:content-["*"] before:text-red-500':''}}">{{$value}}</span>
    @endisset
    {{$input}}
</label>