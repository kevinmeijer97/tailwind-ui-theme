@props(['tag' => 'div'])
<x-tag :is="$tag" {{ $attributes->class('font-bold') }}>
    {!! $slot !!}
</x-tag>
