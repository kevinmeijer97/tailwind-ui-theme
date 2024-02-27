<div class="component md:container">
        <div class="py-20 bg-tut-primary rounded-lg flex flex-col items-center justify-center text-center text-pretty">
            @if ($title ?? '')
                <x-rapidez-tut::title.4xl class="prose-em:text-tut-primary-200 prose text-white prose-em:not-italic">
                    {!! $title !!}
                </x-rapidez-tut::title.4xl>
            @endif
            @if ($description ?? '')
                <div class="text-tut-primary-200 text-lg mt-4">
                    {{ $description }}
                </div>
            @endif
            @if (($button_url ?? '') && ($button_text ?? ''))
                @php($url = ($button_url?->value()?->toArray()['linked_category'] ?? false) && ($button_url?->value()?->toArray()['linked_category']?->value()['url_path'] ?? false) ? '/' . $button_url->value()->toArray()['linked_category']->value()['url_path'] : $button_url->value() ?? '')
                <x-rapidez-tut::button.white class="mt-8" :href="$url">
                    {{ $button_text }}
                </x-rapidez-tut::button.white>
            @endif
        </div>
</div>
