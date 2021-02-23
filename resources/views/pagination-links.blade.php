@if ($paginator->hasPages())
    @foreach ($elements as $element)
        @if (is_string($element))
            <a class="is-active"><li>{{ $element }}</li></a>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="is-active" id="currentPage{{ $page }}"><li>{{ $page }}</li></a>
                @else
                    <a wire:click="gotoPage({{ $page }})"><li>{{ $page }}</li></a>
                @endif
            @endforeach
        @endif
    @endforeach
    <!--href="?page={{$page}}"-->
@endif
