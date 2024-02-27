<x-rapidez-tut::button.primary for="filters" class="mb-3 w-full md:hidden">
    @lang('Filters')
</x-rapidez-tut::button.primary>
<x-rapidez-tut::slideover.filters :title="__('Filters')" id="filters" class="*:w-full">
    {{-- On mobile the filters aren't immedately visible so we should defer loading --}}
    <lazy class="w-full max-md:p-4 md:mt-1.5">
        @include('rapidez::listing.partials.filter.selected')
        @include('rapidez::listing.partials.filter.category')
        <template v-for="filter in filters">
            @include('rapidez::listing.partials.filter.price')
            @include('rapidez::listing.partials.filter.swatch')
            @include('rapidez::listing.partials.filter.boolean')
            @include('rapidez::listing.partials.filter.select')
        </template>
        <div class="py-4">
            <x-rapidez-tut::button.primary for="filters" class="w-full text-sm md:hidden mb-8">
                @lang('Show results')
            </x-rapidez-tut::button.primary>
        </div>
    </lazy>
</x-rapidez-tut::slideover.filters>
