@props(['title' => '', 'id'])

<x-rapidez-tut::slideover
    class="md:static md:z-30 md:w-auto md:max-w-full md:flex-row md:bg-transparent"
    :id="$id"
    :title="$title"
    display="md:hidden"
    scrollWrapper="md:overflow-visible md:py-0"
>
    {{ $slot }}
</x-rapidez-tut::slideover>
