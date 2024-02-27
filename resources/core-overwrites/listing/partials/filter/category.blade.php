<reactive-component
    component-id="category"
    :default-query="() => ({
        aggs: {
            categories: { terms: { field: 'categories.keyword' } },
            category_paths: { terms: { field: 'category_paths.keyword' } }
        }
    })"
    :react="{ and: reactiveFilters.filter(item => item != 'category') }"
    u-r-l-params
>
    <div
        class="relative mb-2.5 md:mb-6"
        slot-scope="{ aggregations, setQuery, value }"
        v-if="aggregations?.categories?.buckets?.length"
    >
        <x-rapidez-tut::filter.title title="Category">
            <category-filter
                :aggregations="aggregations"
                :value="value"
                :set-query="setQuery"
            >
                <div class="flex flex-col gap-1">
                    <label
                        class="relative flex w-full cursor-pointer items-center justify-start gap-x-4 bg-white text-14 text-tut-neutral"
                        v-for="category in aggregations.categories.buckets"
                        :key="category.key"
                        :set="id = category.key.split(' /// ').at(-1).split('::')[0]"
                    >
                        <input
                            class="text-tut-primary border-tut-border rounded"
                            name="category"
                            type="radio"
                            :checked="value == id"
                            :value="id"
                            @change="setQuery({ value: $event.target.value })""
                        />
                        <div class="flex w-full flex-wrap justify-between">
                            <div>@{{ category.key.split('::').at(-1) }}</div>
                            <div class="text-tut-inactive ml-auto inline text-sm">(@{{ item.doc_count }})</div>
                        </div>
                    </label>
                </div>
            </category-filter>
        </x-rapidez-tut::filter.title>
    </div>
</reactive-component>
