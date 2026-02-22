@if ($paginator->hasPages())
<div class="pagination">

    {{-- 前へ --}}
    @if ($paginator->onFirstPage())
        <span class="disabled">＜</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}">＜</a>
    @endif

    {{-- ページ番号 --}}
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- 次へ --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">＞</a>
    @else
        <span class="disabled">＞</span>
    @endif

</div>
@endif