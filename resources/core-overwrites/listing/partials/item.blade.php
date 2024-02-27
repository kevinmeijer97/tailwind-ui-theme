<template {!! isset($slider) ? '' : 'slot="renderItem" slot-scope="{ item, count }"' !!}>
    <div class="my-0.5 h-full w-full shrink-0 snap-start px-4 sm:my-2 sm:w-1/2 lg:w-1/3 xl:w-1/4">
        <div class="group relative flex flex-1 flex-col" :key="item.entity_id">
            @if (App::providerIsLoaded('Rapidez\Wishlist\WishlistServiceProvider'))
                <div class="group absolute right-0 top-0 z-10 p-2">
                    @include('rapidez::wishlist.button')
                </div>
            @endif
            <a :href="item.url | url" class="block">
                <div class="relative aspect-[0.9] overflow-hidden rounded-md border">
                    <img
                        v-if="item.thumbnail"
                        :src="'/storage/{{ config('rapidez.store') }}/resizes/400/magento/catalog/product' + item.thumbnail + '.webp'"
                        class="mb-3 h-full w-full rounded-t object-contain"
                        :alt="item.name"
                        :loading="config.category && count <= 4 ? 'eager' : 'lazy'"
                        width="400"
                        height="400"
                    />
                    <x-rapidez::no-image v-else class="mb-3 h-48 rounded-t" />
                    <div class="absolute inset-0 bg-gray-700/5"></div>
                </div>
                <div class="tetx-tut-neutral mt-5 flex items-center justify-between gap-4 px-2 text-sm font-medium">
                    <div class="truncate">@{{ item.name }}</div>
                    <div class="flex items-center space-x-2">
                        <div>@{{ (item.special_price || item.price) | price }}</div>
                        <div v-if="item.special_price" class="line-through">@{{ item.price | price }}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>
