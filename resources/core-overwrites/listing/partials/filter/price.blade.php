<div
    class="relative"
    v-if="filter.input == 'price'"
>
    <x-rapidez-tut::filter.title>
        <dynamic-range-slider
            :slider-options="{ dragOnClick: true, useKeyboard: false }"
            data-field="price"
            :component-id="filter.code"
            :react="{ and: ['query-filter'] }"
            :show-filter="false"
            u-r-l-params
        ></dynamic-range-slider>
    </x-rapidez-tut::filter.title>
</div>
