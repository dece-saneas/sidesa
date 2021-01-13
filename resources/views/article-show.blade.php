@extends('layouts.master-frontend')

@section('title') Artikel @endsection

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
<div class="py-md-5 pt-5 pb-4 w3l-singleblock1">
    <div class="container mt-md-3">
        <h3 class="blog-desc-big">{{ $article->title }}</h3>
        <div class="blog-post-align">
            <div class="entry-meta">
                <span class="comments-link">By</span>
                <span class="cat-links"><a href="" rel="category tag">{{ $article->user->name }}</a></span> /
                <span class="posted-on"><span class="published">{{ $article->created_at->format('F d, Y') }}</span></span>
            </div>
        </div>
    </div>
</div>
<section class="blog-post-main w3l-homeblock1">
    <div class="blog-content-inf pb-5">
        <div class="container pb-lg-4">
            <div class="single-post-image">
                <div class="post-content">
                    <img src="{{ asset('img/article/'.$article->image) }}" class="radius-image-full img-fluid mb-5 w-100" alt="">
                </div>
            </div>
            <div class="single-post-content">
                {!! $article->content !!}
            </div>
        </div>
    </div>
</section>
@endsection