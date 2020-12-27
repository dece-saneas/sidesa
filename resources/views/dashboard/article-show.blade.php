@extends('layouts.master')
@section('title') Show Article @endsection
@section('content')
<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="jumbotron s-container-title">
				<h1 class="display-4">Show Article</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
              			<li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
              			<li class="breadcrumb-item"><a href="{{ route('article')}}">Article</a></li>
						<li class="breadcrumb-item active" aria-current="page">Show Article</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div class="content pb-4">
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <div class="card">
                        <div class="card-header">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-check mr-2"></i>Approve</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</button>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img/article/'.$article->image) }}" alt="Article Image" class="w-100 img-thumbnail">
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            
                            <h1>{{ $article->title }}</h1>
                            </div>
                            {!! $article->content !!}
                        </div>
                        
                        
                    </div>
                    @hasrole('Admin')
                    @if($article->status == 'In Review')
                    
                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-footer">
                            <h3 class="card-title">Discussion</h3>
                        </div>
                        <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="{{ asset('img/user/bot.jpg') }}" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      @BOT
                      <span class="text-muted float-right">8:03 PM - 
                        
                        @if (\Carbon\Carbon::parse('2020-12-25 02:11:11')->toDateString() === date('Y-m-d'))
    Today
@elseif (\Carbon\Carbon::parse('2020-12-25 02:11:11')->toDateString() === date('Y-m-d', strtotime('-1 day')))
    Yesterday
@else
    {{'25 December 2020'}}
@endif
                        
                        </span>
                    </span><!-- /.username -->
                    <strong>Jurnalis Pertama</strong> Telah membuat artikel.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="{{ asset('img/user.jpg') }}" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Admin Pertama
                      <span class="text-muted float-right">8:03 PM - Today</span>
                    </span><!-- /.username -->
                    Mohon di perbaiki penulisan nya mas di bagian pembukaan itu, Terimakasih.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="{{ asset('img/user/placeholder.jpg') }}" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Jurnalis Pertama
                        
                      <span class="text-muted float-right">8:03 PM - Today</span>
                    </span><!-- /.username -->
                    Sudah saya revisi pak, coba diperiksa kembali ya. <a href=""><span class="badge badge-light">Delete</span></a>
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
                        <div class="card-footer">
                <form action="#" method="post">
                  <img class="img-fluid img-circle img-sm" src="{{ asset('img/user.jpg') }}" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                      <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-paper-plane mr-2"></i>Send</button>
                                    </span>
                                </div>
                            </form>
                  </div>
                </form>
              </div>
                    </div>
                </div>
                    @endif
                    @endhasrole
                    @hasrole('Jurnalis')
                    @if($article->status == 'In Review')
                    <div class="card">
                        <div class="card-header text-center font-italic">
                            @if($article->note)
                            <strong>Admin</strong> : {{ $article->note }}
                            @else
                            Artikel anda belum di review
                            @endif
                        </div>
                    </div>
                    @endif
                    @endhasrole
                </div>
                
            </div>
		</div>
	</div>
</div>
@endsection
