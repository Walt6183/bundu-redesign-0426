@props(['items' => []])

@if(count($items) > 0)
<nav aria-label="Breadcrumb" class="bg-light border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <ol class="flex flex-wrap items-center gap-1 text-sm text-ink/60" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="{{ url('/') }}" itemprop="item" class="hover:text-teal transition-colors">
                    <span itemprop="name">Startseite</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            @foreach($items as $i => $item)
                <li class="flex items-center gap-1" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span class="text-ink/30">/</span>
                    @if(isset($item['url']) && !$loop->last)
                        <a href="{{ url($item['url']) }}" itemprop="item" class="hover:text-teal transition-colors">
                            <span itemprop="name">{{ $item['label'] }}</span>
                        </a>
                    @else
                        <span itemprop="item" itemtype="https://schema.org/WebPage" class="text-navy font-medium">
                            <span itemprop="name">{{ $item['label'] }}</span>
                        </span>
                    @endif
                    <meta itemprop="position" content="{{ $i + 2 }}">
                </li>
            @endforeach
        </ol>
    </div>
</nav>
@endif
