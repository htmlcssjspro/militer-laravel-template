@props(['overlay', 'header', 'main', 'footer'])

<article {{ $attributes->class(['article']) }}>

    @isset($overlay)
        <div class="article__background">
            {{ $overlay }}
        </div>
        <div class="article__overlay"></div>
    @endisset

    <x-layout.content master="article" flex>

        @isset($header)
            <header {{ $header->attributes->class(['article__header']) }}>
                {{ $header }}
            </header>
        @endisset

        @isset($main)
            <div {{ $main->attributes->class(['article__main']) }}>
                {{ $main }}
            </div>
        @endisset

        {{ $slot }}

        @isset($footer)
            <footer {{ $footer->attributes->class(['article__footer']) }}>
                {{ $footer }}
            </footer>
        @endisset

    </x-layout.content>
</article>
