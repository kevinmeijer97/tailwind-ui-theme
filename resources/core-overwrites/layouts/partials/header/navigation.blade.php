<x-rapidez-tut::slideover.nav id="navigation" :title="__('Menu')">
    <nav class="text-tut-neutral md:text-tut-inactive flex w-full max-md:flex-col md:justify-center md:bg-white">
        <ul class="flex max-md:mt-[20px] max-md:flex-col max-md:divide-y max-md:border-y max-md:bg-white md:h-full">
            @foreach (Statamic::tag('nav:header') ?: [] as $item)
                @php($url = isset($item['linked_category']) && ($item['linked_category']?->value()['url_path'] ?? '') ? '/' . $item['linked_category']?->value()['url_path'] : $item['url'] ?? '')
                <li class="group">
                    <span class="relative block">
                        @if ($item['title'] ?? false)
                            <a href="{{ $url }}" @class([
                                'flex max-md:justify-between items-center p-5 relative hover:text-tut-neutral',
                                'max-md:pointer-events-none ' => $item['children'],
                            ])>
                                {{ $item['title'] }}
                                @if ($item['children'])
                                    <x-heroicon-o-chevron-right class="size-4 md:hidden" />
                                @endif
                            </a>
                            @if ($item['children'])
                                <div class="bg-tut-primary pointer-events-none absolute inset-x-0 top-full z-20 mx-5 h-1 -translate-y-1/2 rounded-full opacity-0 transition group-hover:opacity-100 max-md:hidden"></div>
                                <label class="absolute inset-0 cursor-pointer md:hidden" for="{{ $level2 = uniqid('level2-') }}"></label>
                            @endif
                        @endif
                    </span>
                    @if ($item['children'])
                        <x-rapidez-tut::slideover.nav id="{{ $level2 }}" :overlay="false" menuId="navigation" :title="__('Menu')">
                            <div class="flex w-full max-md:flex-col">
                                <div class="pointer-events-none absolute inset-x-0 top-full z-10 justify-center border-y bg-white py-6 opacity-0 transition group-hover:pointer-events-auto group-hover:opacity-100 max-md:contents">
                                    <ul class="flex grid-cols-4 md:container max-md:mt-5 max-md:flex-col max-md:divide-y max-md:border-y max-md:bg-white md:grid md:h-full">
                                        @foreach ($item['children'] ?: [] as $subItem)
                                            @php($url = isset($subItem['linked_category']) && ($subItem['linked_category']?->value()['url_path'] ?? '') ? '/' . $subItem['linked_category']?->value()['url_path'] : $subItem['url'] ?? '')
                                            <li class="group">
                                                <span class="relative block md:contents">
                                                    @if ($subItem['title'] ?? false)
                                                        <a href="{{ $url }}" class="hover:text-tut-neutral flex items-center py-2 max-md:justify-between max-md:p-5">
                                                            {{ $subItem['title'] }}
                                                        </a>
                                                    @endif
                                                    @if ($subItem['children'])
                                                        <label class="absolute inset-0 cursor-pointer md:hidden" for="{{ $level2 = uniqid('level2-') }}"></label>
                                                    @endif
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </x-rapidez-tut::slideover.nav>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</x-rapidez-tut::slideover.nav>
