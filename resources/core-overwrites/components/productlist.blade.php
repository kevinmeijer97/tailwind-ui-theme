@props(['value', 'title' => false, 'field' => 'sku.keyword'])

@if ($value)
    <div class="component container">
        <lazy v-slot="{ intersected }">
            <listing v-if="intersected">
                <x-rapidez::reactive-base>
                    <reactive-list
                        component-id="{{ md5(serialize($value)) }}"
                        data-field="{{ $field }}"
                        :size="999"
                        :default-query="function () { return { query: { terms: { '{{ $field }}': {!!
                            is_array($value)
                                ? "['".implode("','", $value)."']"
                                : $value
                        !!} } } } }"
                    >
                        @if ($title)
                            <strong class="font-bold text-2xl mt-5" slot="renderResultStats">
                                @lang($title)
                            </strong>
                        @else
                            <div slot="renderResultStats"></div>
                        @endif
                        <div slot="renderNoResults"></div>
                        <div class="relative" slot="render" slot-scope="{ data, loading }" v-if="!loading">
                            <slider>
                                <div slot-scope="{ navigate, showLeft, showRight, currentSlide, slidesTotal }">
                                    <div class="-mx-4 flex mt-5 overflow-x-auto snap-x scrollbar-hide scroll-smooth snap-mandatory" ref="slider">
                                        <template v-for="item in data">
                                            @include('rapidez::listing.partials.item', ['slider' => true])
                                        </template>
                                    </div>
                                    <x-rapidez::button.slider
                                        class="absolute left-0 top-1/2 sm:-translate-x-1/2 -translate-y-1/2"
                                        v-if="showLeft"
                                        v-on:click="navigate(currentSlide - 1)"
                                        :aria-label="__('Prev')"
                                    >
                                        <x-heroicon-o-chevron-left class="w-6 h-6 shrink-0"/>
                                    </x-rapidez::button.slider>
                                    <x-rapidez::button.slider
                                        class="absolute right-0 top-1/2 sm:translate-x-1/2 -translate-y-1/2"
                                        v-if="showRight"
                                        v-on:click="navigate(currentSlide + 1)"
                                        :aria-label="__('Next')"
                                    >
                                        <x-heroicon-o-chevron-right class="w-6 h-6 shrink-0"/>
                                    </x-rapidez::button.slider>
                                </div>
                            </slider>
                        </div>
                    </reactive-list>
                </x-rapidez::reactive-base>
            </listing>
        </lazy>
    </div>
@endif
