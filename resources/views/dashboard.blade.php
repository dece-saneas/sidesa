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
	<div class="content">
		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $covid['Kasus_Posi'] }}</h3>
                            <p>Total Positif</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-procedures"></i>
                        </div>
                        <a href="https://kawalcorona.com/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $covid['Kasus_Semb'] }}</h3>
                            <p>Total Sembuh</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <a href="https://kawalcorona.com/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $covid['Kasus_Meni'] }}</h3>
                            <p>Total Meninggal</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sad-tear"></i>
                        </div>
                        <a href="https://kawalcorona.com/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
