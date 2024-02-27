<div class="component container">
    @if ($title ?? '')
        <h2 class="text-tut-neutral text-2xl font-bold tracking-tight">{{ $title }}</h2>
    @endif
    @if ($description ?? '')
        <p class="text-tut-inactive mt-4 text-base">{{ $description }}</p>
    @endif

    <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
        @foreach ($tiles ?? [] as $tile)
            @php($url = ($tile->url?->toArray()['linked_category'] ?? false) && ($tile->url?->toArray()['linked_category']?->value()['url_path'] ?? false) ? '/' . $tile->url->toArray()['linked_category']->value()['url_path'] : $tile->url ?? '')
            <a href="{{ $url }}" class="group block">
                <div aria-hidden="true" class="aspect-square overflow-hidden rounded-lg group-hover:opacity-75">
                    @if ($tile->image)
                        @responsive($tile->image, ['class' => 'h-full w-full object-cover object-center'])
                    @endif
                </div>
                @if ($tile->title ?? '')
                    <h3 class="text-tut-neutral mt-4 text-base font-semibold">{{ $tile->title }}</h3>
                @endif
                @if ($tile->description ?? '')
                    <p class="text-tut-inactive mt-2 text-sm">{{ $tile->description }}</p>
                @endif
            </a>
        @endforeach
    </div>
</div>
