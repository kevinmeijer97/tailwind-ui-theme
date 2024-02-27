<multi-list
    v-if="['multiselect', 'select'].includes(filter.input)"
    :component-id="filter.code"
    :data-field="filter.code + '.keyword'"
    :size="15"
    :react="{ and: filter.input == 'multiselect' ? reactiveFilters : reactiveFilters.filter(item => item != filter.code) }"
    :query-format="filter.input == 'multiselect' ? 'and' : 'or'"
    :show-search="false"
    u-r-l-params
>
    <div v-if="data.length > 0" slot="render" slot-scope="{ data, handleChange, value }">
        <x-rapidez-tut::filter.title>
            <ul class="flex flex-col gap-1">
                <li v-for="item, index in data" class="flex justify-between text-base" :key="item._id">
                    <label class="flex w-full items-center justify-between" :for="`cb_${item.key}`">
                        <input v-bind:checked="value[item.key]" v-on:change="handleChange(item.key)" class="text-tut-primary border-tut-border rounded" type="checkbox" :id="`cb_${item.key}`" />
                        <span class="text-tut-inactive ml-2 text-base font-normal">
                            @{{ item.key }}
                        </span>
                        <div class="text-tut-inactive ml-auto inline text-sm">(@{{ item.doc_count }})</div>
                    </label>
                </li>
            </ul>
        </x-rapidez-tut::filter.title>
    </div>
</multi-list>
