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
						<li class="breadcrumb-item active" aria-current="page">Show</li>
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
                    <!-- Article -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
							<div class="float-right">
                                @hasrole('Jurnalis')
                                    @if($article->status == 'Draft' || $article->status == 'In Review')
                                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-default mr-2"><i class="fas fa-edit mr-2"></i>Edit</a>
                                    @elseif($article->status == 'Approved' || $article->status == 'Published')
                                    <button class="btn btn-default mr-2" disabled><i class="fas fa-edit mr-2"></i>Edit</button>
                                    @endif
                                    @if($article->status == 'Draft')
                                    <a href="{{ route('article.toggle', [$article->id, 'review']) }}" class="btn btn-success"><i class="fas fa-paper-plane mr-2"></i>Create Article</a>
                                    @elseif($article->status == 'In Review')
                                    <button class="btn btn-default" disabled><i class="fas fa-search mr-2"></i>In Review</button>
                                    @elseif($article->status == 'Approved')
                                    <button class="btn btn-primary" disabled><i class="fas fa-check mr-2"></i>Approved</button>
                                    @elseif($article->status == 'Published')
                                    <button class="btn btn-success" disabled><i class="fas fa-bookmark mr-2"></i>Published</button>
                                    @endif
                                @endhasrole
                                @hasrole('Admin')
                                    @if($article->status == 'In Review')
                                    <a href="{{ route('article.toggle', [$article->id, 'approve']) }}" class="btn btn-default mr-2"><i class="fas fa-check mr-2"></i>Approve</a>
                                    <a href="{{ route('article.toggle', [$article->id, 'publish']) }}" class="btn btn-default"><i class="fas fa-bookmark mr-2"></i>Publish</a>
                                    @elseif($article->status == 'Approved')
                                    <a href="{{ route('article.toggle', [$article->id, 'approve']) }}" class="btn btn-primary mr-2"><i class="fas fa-check mr-2"></i>Approved</a>
                                    <a href="{{ route('article.toggle', [$article->id, 'publish']) }}" class="btn btn-default"><i class="fas fa-bookmark mr-2"></i>Publish</a>
                                    @elseif($article->status == 'Published')
                                    <a href="{{ route('article.toggle', [$article->id, 'approve']) }}" class="btn btn-primary mr-2"><i class="fas fa-check mr-2"></i>Approved</a>
                                    <a href="{{ route('article.toggle', [$article->id, 'publish']) }}" class="btn btn-success"><i class="fas fa-bookmark mr-2"></i>Published</a>
                                    @endif
                                @endhasrole
							</div>
							<a href="{{ route('article') }}" class="btn btn-default"><i class="fas fa-times mr-2"></i>Cancel</a>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img/article/'.$article->image) }}" alt="Article Image" class="w-100 img-thumbnail">
                        </div>
                        <div class="card-body">
							<h1>{{ $article->title }}</h1>
							<h6><a href="#">{{ $article->user->name }}</a> / {{ $article->created_at->format('d F, Y') }}</h6>
							<hr>
                            {!! $article->content !!}
                        </div>
					</div>
					 <!-- Comment -->
                    @if($article->status !== 'Draft')
					<div class="card direct-chat direct-chat-primary">
                        <div class="card-footer">
                            <h3 class="card-title">Discussion</h3>
                        </div>
                        <div class="card-footer card-comments">
							@foreach ($article->comment as $no => $c)
							<div class="card-comment">
								<img class="img-circle img-sm" src=" @if($c->user_id == NULL) {{ asset('img/user/bot.jpg') }} @else {{ asset('img/user/placeholder.jpg') }} @endif " alt="User Image">
								<div class="comment-text">
									<span class="username">
										@if($c->user_id == NULL) @BOT @else {{ $c->user->name }} @endif
										<span class="text-muted float-right">{{ $c->created_at->format('h:i A') }} - 
										@if (\Carbon\Carbon::parse($c->created_at)->toDateString() === date('Y-m-d')) Today
										@elseif (\Carbon\Carbon::parse($c->created_at)->toDateString() === date('Y-m-d', strtotime('-1 day'))) Yesterday
										@else {{$c->created_at->format('d F, Y')}}
										@endif
										</span>
									</span>
									{!! $c->comment !!} @if($c->user_id == Auth::user()->id)<a href="{{ route('article-comment.destroy', $c->id) }}" ><span class="badge badge-light">Delete</span></a>@endif
								</div>
							</div>
							@endforeach
						</div>
						<div class="card-footer">
							<form action="{{ route('article-comment.store', $article->id) }}" method="POST">
							@csrf
								<img class="img-fluid img-circle img-sm" src="{{ asset('img/user/placeholder.jpg') }}" alt="Alt Text">
								<div class="img-push">
									<div class="input-group">
										<input type="text" name="comment" placeholder="Type Message ..." class="form-control" @if($article->status == 'Approved' || $article->status == 'Published') disabled @endif>
										<span class="input-group-append">
											<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane mr-2"></i>Send</button>
										</span>
									</div>
								</div>
                            </form>
						</div>
					</div>
					@endif
                </div>                
            </div>
		</div>
	</div>
</div>
@endsection
