<multi-list
    v-else-if="filter.input == 'boolean'"
    :component-id="filter.code"
    :data-field="filter.code+(filter.type != 'int' ? '.keyword' : '')"
    :react="{and: reactiveFilters}"
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
                            <template v-if="item.key">@lang('Yes')</template>
                            <template v-else>@lang('No')</template>
                        </span>
                        <div class="text-tut-inactive ml-auto inline text-sm">(@{{ item.doc_count }})</div>
                    </label>
                </li>
            </ul>
        </x-rapidez-tut::filter.title>
    </div>
</multi-list>
