@extends('layouts.master-frontend')

@section('title') Desa Blang Kolak II - Artikel @endsection

@section('content')
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Artikel</h2>
        </div>
    </section>
</div>
<div class="position-relative">
	<div class="shape overflow-hidden">
		<svg viewBox="0 0 2880 48" fill="none" xmlns="">
			<path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
		</svg>
	</div>
</div>
<section class="w3l-blogblock py-5">
	<div class="container pt-lg-4 pt-md-3">
        @if (count($article) > 0)
        @foreach ($article as $no => $a)
		<div class="item mt-5">
			<div class="row">
				<div class="col-lg-6">
					<a href="#">
						<img class="card-img-bottom d-block radius-image-full" src="{{ asset('img/article/'.$a->image) }}" alt="Card image cap">
					</a>
				</div>
				<div class="col-lg-6 blog-details align-self mt-lg-0 mt-4">
					<a href="#" class="blog-desc-big">{{ $a->title }}</a>
					<div class="entry-meta mb-3">
						<span class="posted-on">By</span>
						<span class="comments-link"> <a href="#">{{ $a->user->name }}</a> </span> /
						<span class="posted-on"><span class="published"> {{ $a->created_at->format('d F Y') }}</span></span>
					</div>
                    {!! Str::limit($a->content, 120) !!}
					<p></p>
					<a href="#" class="btn btn-primary btn-style mt-4">Read More</a>
				</div>
			</div>
		</div>
        @endforeach
        {{ $article->links('layouts.pagination-frontend') }}
        @endif
	</div>
</section>
@endsection