@extends('rt-starter-kit::layouts.admin')

@section('styles')

@endsection
@section('content')
<div class="content">
  <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    <ul class="breadcrumb">
      <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="{{ route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.index') }}">Properties</a></li>
      <li class="active">Edit Property</li>
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
      <h1 class="title mt-0">Edit Post</h1>
    </div>
  </div>
  <hr class="mt-0">
  <form action="{{route('posts.update', $post->id)}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="row">
      <div class="column col-lg-9 is-three-quarters-tablet">
        <div class="form-group">
          <input type="text" name="post_title" placeholder="Post Title" class="form-control" value="{{$post->post_title}}">
        </div>

        <div class="form-group">
          <textarea type="textarea" name="post_content" class="form-control summernote" 
          placeholder="Compose your masterpiece..." rows="20">{{$post->post_content}}</textarea>
        </div>

        
        <div class="form-group">
          <select class="form-control">
            @foreach($taxonomies as $i => $taxonomy)
              <option>{{ $taxonomy->term->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="column col-lg-3 is-narrow-tablet">
        <div class="card card-widget">
          <div class="card-body author-widget widget-area">
            <div class="selected-author">
              <img src="https://placehold.it/50x50"/>
              <div class="author">
                <h4>{{ $post->getAuthorName() }}</h4>
              </div>
            </div>
            <div class="status">
              <div class="status-icon">
                <i icon="assignment" size="is-medium"></i>
              </div>
              <div class="status-details">
                <p>
                  Status: {{ studly_case($post->post_status) }}
                </p>
                <p>{{ $post->ago() }}</p>
              </div>
            </div>

            <div class="btn-group btn-group-justified">
              <button name="submit" value="draft" class="btn btn-default">Save Draft</button>
              <button name="submit" value="publish" class="btn btn-default">Publish</button>
              <a class="btn btn-default" href="{{ route('posts.show', $post->id) }}">View</a>
            </div>
            <div>
              
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<script type="text/javascript">
  $(function() {
    $('.summernote').summernote({
      height: 300,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
   });
  })
</script>
@endsection
