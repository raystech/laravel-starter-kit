@extends('rt-starter-kit::layouts.admin')

@section('styles')

@endsection
@section('content')
<div class="content">
  <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    <ul class="breadcrumb">
      <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="{{ route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.index') }}">Properties</a></li>
      <li class="active">Show Property</li>
    </ul>

    <ul class="breadcrumb-elements">
      <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon-gear position-left"></i>
          Settings
          <span class="caret"></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
          <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
          <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
        </ul>
      </li>
    </ul>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="wrap">
    <div class="column">
      <h1 class="title mt-0">Preview Post</h1>
    </div>
  </div>
  <hr class="mt-0">
  <form action="{{route('posts.update', $post->id)}}" method="post">
    <div class="row">
      <div class="column col-lg-9 is-three-quarters-tablet">
        <div class="panel panel-flat">
          <div class="panel-heading pb-0">
            <h5 class="panel-title">{{$post->post_title}}</h5>
          </div>
          <div class="panel-body">
            <div name="post_content" >{!!$post->post_content!!}</div>
          </div>
        </div>
      </div>

      <div class="column col-lg-3 is-narrow-tablet">
        <div class="card card-widget">
          <div class="card-body author-widget widget-area">
            <div class="selected-author">
              <img src="https://placehold.it/50x50"/>
              <div class="author">
                <h4>Alex Curtis</h4>
              </div>
            </div>
            <div class="status">
              <div class="status-icon">
                <i icon="assignment" size="is-medium"></i>
              </div>
              <div class="status-details">
                <h4><span class="status-emphasis">Draft</span> Saved</h4>
                <p>A Few Minutes Ago</p>
              </div>
            </div>

            <div class="btn-group btn-group-justified">
              <a href="{{ route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.edit', $post->id) }}" class="btn btn-default btn-sm btn-fat">Edit</a>
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-danger btn-sm btn-fat">Delete</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection

@section('scripts')

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

@endsection
