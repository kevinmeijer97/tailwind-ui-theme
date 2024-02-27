<div class="component">
    <div class="relative isolate overflow-hidden bg-white px-6 lg:overflow-visible lg:px-0">
        <div class="container grid grid-cols-1 gap-x-8 gap-y-16 px-0 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div class="lg:container lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:grid lg:w-full lg:grid-cols-2 lg:gap-x-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        @if ($title ?? '')
                            <div class="text-tut-neutral mt-2 text-3xl font-bold tracking-tight sm:text-4xl">{!! $title !!}</div>
                        @endif
                        @if ($description ?? '')
                            <div class="text-tut-inactive mt-6 text-xl leading-8">{!! $description !!}</div>
                        @endif
                        @if (($button_url ?? '') && ($button_text ?? ''))
                            @php($url = ($button_url?->value()?->toArray()['linked_category'] ?? false) && $button_url?->value()?->toArray()['linked_category']?->value()['url_path'] ?? false ? '/' . $button_url->value()->toArray()['linked_category']->value()['url_path'] : $button_url->value() ?? '')
                            <x-rapidez-tut::button.primary class="mt-6 w-fit" :href="$url">{{ $button_text }}</x-rapidez-tut::button.primary>
                        @endif
                    </div>
                </div>
            </div>
            <div class="-ml-12 -mt-12 p-12 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                @if ($image ?? '')
                    @responsive($image, ['class' => 'bg-tut-neutral ring-tut-neutral/10 w-[48rem] max-w-none rounded-xl shadow-xl ring-1 sm:w-[57rem]'])
                @endif
            </div>
        </div>
    </div>
</div>
