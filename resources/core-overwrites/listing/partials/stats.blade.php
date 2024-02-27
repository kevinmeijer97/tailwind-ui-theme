<div slot="renderResultStats" class="text-sm text-tut-inactive flex-1" slot-scope="{ numberOfResults, numberOfPages, currentPage, time }">
    @{{ numberOfResults }} @lang('products')
    <template v-if="numberOfPages > 1">
        (@lang('page'): @{{ currentPage + 1 }}/@{{ numberOfPages }})
    </template>
</div>
