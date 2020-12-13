@extends('layouts.master-frontend')

@section('title') Desa Blang Kolak II - Article @endsection

@section('content')
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Article</h2>
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
		<div class="item">
			<div class="row">
				<div class="col-lg-6">
					<a href="#">
						<img class="card-img-bottom d-block radius-image-full" src="{{ asset('img/news/news1.jpg') }}" alt="Card image cap">
					</a>
				</div>
				<div class="col-lg-6 blog-details align-self mt-lg-0 mt-4">
					<a href="#" class="blog-desc-big">Charity, Faith and hope, Help the poor, Help the Homeless</a>
					<div class="entry-meta mb-3">
						<span class="posted-on">By</span>
						<span class="comments-link"> <a href="#">Padlika</a> </span> /
						<span class="cat-links"><a href="#url" rel="category tag">Kesehatan</a></span> / 
						<span class="posted-on"><span class="published"> 18 Desember 2020</span></span>
					</div>
					<p>Lorem ipsum dolor sit amet elit. Eos, odit non ossimus voluptas sit nihil nam id explicabo saepe sapiente, dicta officia odio natus nemo. Ratione ipsa esse quod autem, in fugit odio.</p>
					<a href="#" class="btn btn-primary btn-style mt-4">Read More</a>
				</div>
			</div>
		</div>
		<div class="pagination-wrapper my-lg-5 mt- py-lg-3 text-center">
			<ul class="page-pagination">
				<li><a class="next" href="#url"><span class="fa fa-angle-left"></span> Prev</a></li>
				<li><a class="page-numbers" href="#url">1</a></li>
				<li><span aria-current="page" class="page-numbers current">2</span></li>
				<li><a class="page-numbers" href="#url">3</a></li>
				<li><a class="next" href="#url">Next <span class="fa fa-angle-right"></span></a></li>
			</ul>
		</div>
	</div>
</section>
@endsection