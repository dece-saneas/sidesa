<nav class="mt-4">
	<ul class="pagination justify-content-center">
		<!-- Previous Page Link -->
		@if ($paginator->onFirstPage())
		<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
			<span class="page-link" aria-hidden="true">First</span>
		</li>
		<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
			<span class="page-link" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
		</li>
		@else
		<li class="page-item">
			<a class="page-link" href="{{ $paginator->url(1) }}" rel="prev" aria-label="@lang('pagination.previous')">First</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fas fa-angle-left"></i></a>
		</li>
		@endif
		
		<!-- Page Link -->
		@foreach(range(1, $paginator->lastPage()) as $i)
			@if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
				@if ($i == $paginator->currentPage())
					<li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
				@else
					<li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
				@endif
			@endif
		@endforeach
		
		<!-- Next Page Link -->
		@if ($paginator->hasMorePages())
		<li class="page-item">
			<a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fas fa-angle-right"></i></a>
		</li>
		<li class="page-item">
			<a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next" aria-label="@lang('pagination.next')">Last</a>
		</li>
		@else
		<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
			<span class="page-link" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
		</li>
		<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
			<span class="page-link" aria-hidden="true">Last</span>
		</li>
		@endif
	</ul>
</nav>
