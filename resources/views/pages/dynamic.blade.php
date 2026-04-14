<x-layouts.app
    :metaTitle="$page->seo_title ?: $page->title"
    :metaDescription="$page->seo_description"
>
    @if($page->blocks)
        @foreach($page->blocks as $block)
            @include('blocks.' . $block['type'], ['data' => $block['data']])
        @endforeach
    @endif
</x-layouts.app>
