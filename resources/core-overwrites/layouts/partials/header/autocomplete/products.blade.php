<ul class="grid gap-5 divide-y *:pt-5">
    <li v-for="suggestion in suggestions" :key="suggestion.source._id">
        <a key="suggestion.source._id" :href="suggestion.source.url | url" class="flex flex-1 flex-wrap">
            <img :src="'/storage/{{ config('rapidez.store') }}/resizes/80x80/magento/catalog/product' + suggestion.source.thumbnail + '.webp'" class="aspect-square w-14 self-center object-contain" />
            <div class="flex flex-1 flex-wrap px-2">
                <strong class="hyphens block w-full" v-html="highlight(suggestion, 'name')"></strong>
                <div class="self-end">@{{ suggestion.source.price | price }}</div>
            </div>
        </a>
    </li>
</ul>
