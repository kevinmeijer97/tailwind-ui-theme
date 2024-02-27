<div class="component md:container">
    <div class="relative">
        @if ($image ?? '')
            @responsive($image, ['class' => 'h-[500px] w-full object-cover md:rounded-2xl md:shadow-xl'])
        @endif
        <div class="text-pretty absolute inset-0 flex flex-col items-center justify-center text-center">
            @if ($title ?? '')
                <x-rapidez-tut::title.6xl class="prose-em:text-tut-primary-200 prose text-white prose-em:not-italic">
                    {!! $title !!}
                </x-rapidez-tut::title.6xl>
            @endif
            @if (($button_url ?? '') && ($button_text ?? ''))
                @php($url = ($button_url?->value()?->toArray()['linked_category'] ?? false) && ($button_url?->value()?->toArray()['linked_category']?->value()['url_path'] ?? false) ? '/' . $button_url->value()->toArray()['linked_category']->value()['url_path'] : $button_url->value() ?? '')
                <x-rapidez-tut::button.white class="mt-10" :href="$url">
                    {{ $button_text }}
                </x-rapidez-tut::button.white>
            @endif
        </div>
    </div>
</div>
