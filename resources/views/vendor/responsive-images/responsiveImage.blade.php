<picture>
    @foreach ($breakpoints ?? [] as $breakpoint)
        @foreach ($breakpoint->sources() ?? [] as $source)
            @php
                $srcSet = $source->getSrcset();
            @endphp

            @if ($srcSet !== null)
                <source
                    srcset="{{ $srcSet }}"
                    @if ($type = $source->getMimeType()) type="{{ $type }}" @endif
                    @if ($media = $source->getMediaString()) media="{{ $media }}" @endif
                    @if ($includePlaceholder ?? false) sizes="1px" @endif
                >
            @endif
        @endforeach
    @endforeach

    <img
        src="{{ $src }}"
        {!! $attributeString ?? '' !!}
        @unless(\Illuminate\Support\Str::contains($attributeString, 'alt'))
        alt="{{ $asset['alt'] ?? $asset['title'] }}"
        @endunless
        @isset($width) width="{{ $width }}" @endisset
        @isset($height) height="{{ $height }}" @endisset
        @if ($hasSources) data-statamic-responsive-images @endif
        onload="this.onload=null;window.responsiveResizeObserver.observe(this)"
    >
</picture>
