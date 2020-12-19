<div class="pagination-wrapper my-lg-5 mt- py-lg-3 text-center">
    <ul class="page-pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
        @else
        <li><a class="next" href="{{ $paginator->previousPageUrl() }}"><span class="fa fa-angle-left"></span> Prev</a></li>
        @endif
        
        <!-- Page Link -->
        @foreach(range(1, $paginator->lastPage()) as $i)
			@if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
				@if ($i == $paginator->currentPage())
					<li><span aria-current="page" class="page-numbers current">{{ $i }}</span></li>
				@else
                    <li><a class="page-numbers" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
				@endif
			@endif
		@endforeach
        
        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
        <li><a class="next" href="{{ $paginator->nextPageUrl() }}">Next <span class="fa fa-angle-right"></span></a></li>
        @else
        @endif
    </ul>
</div>