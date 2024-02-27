@aware(['id', 'scrollWrapper', 'display', 'menuId' => '', 'overlay' => true, 'left' => true])
<x-tag :is="$menuId ? 'div' : 'form'">
    <input id="{{ $id }}" class="peer hidden" type="checkbox">
    <input id="{{ 'close-' . $id }}" class="hidden" type="reset">
    @if ($overlay)
        <label class="{{ $display }} pointer-events-none fixed inset-0 z-40 cursor-pointer bg-black/50 opacity-0 transition peer-checked:pointer-events-auto peer-checked:opacity-100" for="{{ 'close-' . $id }}"></label>
    @endif
    <div {{ $attributes->merge(['class' => 'fixed inset-y-0  transition-all bg-white z-40 flex flex-col max-w-md w-full ' . ($left ? '-left-full peer-checked:left-0' : '-right-full peer-checked:right-0')]) }}>
        <div class="flex h-full flex-1 flex-col">
            <x-rapidez-tut::slideover.header class="{{ $display }}" />
            <div class="{{ $scrollWrapper }} flex flex-1 flex-col items-start overflow-y-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-tag>
