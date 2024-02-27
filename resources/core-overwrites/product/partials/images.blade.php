<div class="relative">
    @if (App::providerIsLoaded('Rapidez\Wishlist\WishlistServiceProvider'))
        <div class="absolute top-0 right-0 z-10 group p-2">
            @include('rapidez::wishlist.button')
        </div>
    @endif
    @if (count($product->images))
        <div v-if="false" class="aspect-square border rounded-lg relative overflow-hidden">
            <img
                class="flex items-center h-full w-full mx-auto justify-center object-contain"
                src="/storage/{{ config('rapidez.store') }}/resizes/750/magento/catalog/product{{ $product->images[0] }}.webp"
                alt="{{ $product->name }}"
                width="750"
                height="750"
            />
            <div class="absolute inset-0 bg-gray-700/5 pointer-events-none"></div>
        </div>
    @endif

    <images v-cloak>
        <div slot-scope="{ images, active, zoomed, toggleZoom, change }">
            <div class="relative aspect-square border rounded-lg overflow-hidden" v-if="images.length">
                <a
                    :href="config.media_url + '/catalog/product' + images[active]"
                    class="flex items-center h-full w-full mx-auto justify-center"
                    :class="zoomed ? 'fixed inset-0 bg-white !h-full {{ config('rapidez.frontend.z-indexes.lightbox') }} cursor-[zoom-out]' : ''"
                    v-on:click.prevent="toggleZoom"
                >
                    <img
                        v-if="!zoomed"
                        :src="'/storage/{{ config('rapidez.store') }}/resizes/750/magento/catalog/product' + images[active] + '.webp'"
                        alt="{{ $product->name }}"
                        class="object-contain w-full m-auto max-h-full"
                        width="750"
                        height="750"
                    />
                    <img
                        v-else
                        :src="config.media_url + '/catalog/product' + images[active]"
                        alt="{{ $product->name }}"
                        class="max-h-full max-w-full"
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-gray-700/5 pointer-events-none"></div>
                </a>
                <button class="{{ config('rapidez.frontend.z-indexes.lightbox') }} top-1/2 left-3 -translate-y-1/2 rounded-full bg-white border p-2" :class="zoomed ? 'fixed' : 'absolute'" v-if="active" v-on:click="change(active-1)" aria-label="@lang('Prev')">
                    <x-heroicon-o-chevron-left class="size-7 text-tut-inactive" />
                </button>
                <button class="{{ config('rapidez.frontend.z-indexes.lightbox') }} top-1/2 right-3 -translate-y-1/2 rounded-full bg-white border p-2" :class="zoomed ? 'fixed' : 'absolute'" v-if="active != images.length-1" v-on:click="change(active+1)" aria-label="@lang('Next')">
                    <x-heroicon-o-chevron-right class="size-7 text-tut-inactive" />
                </button>
            </div>
            <x-rapidez::no-image v-else class="h-96 rounded" />

            <div v-if="images.length > 1" class="flex" :class="zoomed ? 'fixed bottom-0 left-3 {{ config('rapidez.z-indexes.lightbox') }}' : ' flex-wrap mt-3'">
                <button
                    v-for="(image, imageId) in images"
                    class="flex items-center overflow-hidden relative justify-center bg-white border rounded p-2 mr-3 mb-3 h-[100px] w-[100px]"
                    :class="active == imageId ? 'border-tut-primary' : ''"
                    @click="change(imageId)"
                >
                    <img
                        :src="'/storage/{{ config('rapidez.store') }}/resizes/80x80/magento/catalog/product' + image + '.webp'"
                        alt="{{ $product->name }}"
                        class="object-contain w-full m-auto max-h-[80px]"
                        loading="lazy"
                        width="80"
                        height="80"
                    />
                    <div class="absolute inset-0 bg-gray-700/5"></div>
                </button>
            </div>
            <div v-if="zoomed" class="{{ config('rapidez.frontend.z-indexes.lightbox') }} pointer-events-none fixed top-3 right-3">
                <x-heroicon-o-x-mark class="h-6 w-6" />
            </div>
        </div>
    </images>
</div>
