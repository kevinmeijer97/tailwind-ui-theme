@props(['title' => ''])

<div>
    <span class="text-15 text-tut-neutral font-medium" @if (!$title) v-text="window.config.translations[filter.name] ?? filter.name.replace('_', ' ')" @endif>
        @lang($title)
    </span>
    <div class="mt-4">
        {{ $slot }}
    </div>
    <hr class="my-8" />
</div>
