<reactive-list
    id="products"
    component-id="products"
    data-field="name.keyword"
    list-class="flex flex-wrap mt-5 -mx-4 overflow-hidden"
    :pagination="true"
    v-on:page-click="scrollToElement('#products')"
    :size="20"
    :react="{and: reactiveFilters}"
    :sort-options="sortOptions"
    :inner-class="{
        button: 'pagination-button',
        pagination: 'pagination',
        sortOptions: 'product-listing !h-12 !rounded !text-tut-neutral !font-sans !text-sm font-medium w-1/2 md:w-1/3 focus:ring-tut-primary'
    }"
    prev-label="@lang('Previous')"
    next-label="@lang('Next')"
    u-r-l-params
>
    @include('rapidez::listing.partials.stats')
    @include('rapidez::listing.partials.item')
    @include('rapidez::listing.partials.no-results')
</reactive-list>
