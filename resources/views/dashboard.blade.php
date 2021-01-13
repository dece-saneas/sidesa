@extends('layouts.master')
@section('title') Dashboard @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Dashboard</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-default"><i class="fas fa-viruses"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Informasi Covid-19</span>
                            <span class="info-box-number">Provinsi {{ $glo['data'][0]->A }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-procedures"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Positif</span>
                            <span class="info-box-number">{{ $covid['Kasus_Posi'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-heartbeat"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Sembuh</span>
                            <span class="info-box-number">{{ $covid['Kasus_Semb'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-sad-tear"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Meninggal</span>
                            <span class="info-box-number">{{ $covid['Kasus_Meni'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"><i class="far fa-calendar-alt mr-2"></i>Calendar</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
@endsection
