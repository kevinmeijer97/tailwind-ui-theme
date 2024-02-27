<x-rapidez::notifications />
<x-rapidez::cookie-notice>
    @lang('This website uses cookies')
    <x-slot:button>@lang('Accept cookies')</x-slot:button>
</x-rapidez::cookie-notice>
@if (request()->is('/'))
    <div class="py-24">
        @include('rapidez::layouts.partials.footer.newsletter')
    </div>
@endif
<footer class="container mt-auto bg-white" aria-labelledby="footer-heading">
    <div class="pb-8 pt-16 sm:pt-24 lg:pt-32">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
                @responsive($globals->brand->logo, ['class' => 'h-10 object-contain'])
                @if ($globals->footer->message ?? '')
                    <div class="text-balance text-tut-inactive prose max-w-sm leading-6">
                        {!! $globals->footer->message !!}
                    </div>
                @endif
                <div class="flex space-x-6">
                    @include('rapidez::layouts.partials.footer.social')
                </div>
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 gap-y-10 xl:col-span-2 xl:mt-0 xl:grid-cols-4">
                @foreach (Statamic::tag('nav:footer') ?: [] as $item)
                    @php($url = isset($item['linked_category']) && ($item['linked_category']?->value()['url_path'] ?? '') ? '/' . $item['linked_category']?->value()['url_path'] : $item['url'] ?? '')
                    <div>
                        @if ($item['title'] ?? '')
                            <h3 class="font-semibold leading-6">
                                <a href="{{ $url }}" class="text-tut-neutral hover:text-tut-inactive">{{ $item['title'] }}</a>
                            </h3>
                        @endif
                        <ul role="list" class="mt-6 space-y-4">
                            @foreach ($item['children'] ?: [] as $subItem)
                                @php($url = isset($subItem['linked_category']) && ($subItem['linked_category']?->value()['url_path'] ?? '') ? '/' . $subItem['linked_category']?->value()['url_path'] : $subItem['url'] ?? '')
                                @if ($subItem['title'] ?? '')
                                    <li>
                                        <a href="{{ $url }}" class="text-tut-inactive hover:text-tut-neutral leading-6">{{ $subItem['title'] }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-16 flex justify-center border-t pt-8 sm:mt-20 lg:mt-24">
            @include('rapidez::layouts.partials.footer.copyright')
        </div>
    </div>
</footer>
