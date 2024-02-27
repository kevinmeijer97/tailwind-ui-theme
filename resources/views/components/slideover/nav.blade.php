@props(['menuId' => ''])
<x-rapidez-tut::slideover display="md:hidden" scrollWrapper="md:contents" :$menuId {{ $attributes->merge(['class' => 'md:contents']) }}>
    {{ $slot }}
</x-rapidez-tut::slideover>
