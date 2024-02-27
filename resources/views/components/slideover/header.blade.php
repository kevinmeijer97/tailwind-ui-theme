@aware(['title', 'menuId', 'id', 'paddingX' => 'px-5'])
<div {{ $attributes }}>
    <div class="bg-tut-primary py-5">
        <div class="{{ $paddingX }}">
            <div class="relative flex items-center justify-center">
                @if ($menuId ?? '')
                    <label class="absolute left-0 top-1/2 -translate-y-1/2 cursor-pointer text-white" for="{{ $id }}">
                        <x-heroicon-o-arrow-left class="size-6" />
                    </label>
                @endif
                @if ($title ?? '')
                    <span class="text-18 max-w-[calc(100%-105px)] truncate font-semibold text-white antialiased">
                        {{ $title }}
                    </span>
                @endif
                @php($closeId = $menuId ? $menuId : $id)
                <label class="absolute right-0 top-1/2 -translate-y-1/2 cursor-pointer text-white" for="{{ 'close-' . $closeId }}">
                    <x-heroicon-o-x-mark class="size-6" />
                </label>
            </div>
        </div>
    </div>
</div>
