<header class="relative mb-6">
    @if ($globals->header->top_usp_text ?? '')
        <p class="bg-tut-primary text-tut-primary-text mb-6 flex h-10 items-center justify-center px-4 text-sm font-medium sm:px-6 lg:px-8">
            {{ $globals->header->top_usp_text }}
        </p>
    @endif
    <div class="container flex flex-wrap items-center gap-x-3 max-sm:px-3">
        <div class="flex items-center gap-10">
            <div class="flex items-center gap-4">
                @if ($globals->brand->logo ?? '')
                    <a href="{{ url('/') }}" aria-label="@lang('Go to home')">
                        @responsive($globals->brand->logo, ['class' => 'h-10 max-w-20 object-contain'])
                    </a>
                @endif
                <label for="navigation" class="cursor-pointer md:hidden">
                    <x-heroicon-o-bars-3 class="inline w-7" />
                </label>
            </div>
            <nav class="bg-white text-tut-inactive">
                @include('rapidez::layouts.partials.header.navigation')
            </nav>
        </div>
        <div class="text-tut-inactive ml-auto flex items-center gap-4 md:gap-10">
            <div>
                <label
                    for="search"
                    class="cursor-pointer"
                    v-on:click="$root.loadAutocomplete = true; window.setTimeout(() => window.document.getElementById('autocomplete-input').focus(), 200)"
                >
                    <x-heroicon-o-magnifying-glass class="size-6" />
                </label>
                <x-rapidez-tut::slideover scrollWrapper="p-5" id="search" :left="false" :title="__('Search')">
                    @include('rapidez::layouts.partials.header.autocomplete')
                </x-rapidez-tut::slideover>
            </div>
            @include('rapidez::layouts.partials.header.account')
            <span class="bg-tut-border h-6 w-px"></span>
            @include('rapidez::layouts.partials.header.minicart')
        </div>
    </div>
</header>
