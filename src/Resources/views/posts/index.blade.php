@extends('rt-starter-kit::layouts.admin')

@section('head')

@endsection

@section('content')
<div class="content">
  <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
    <ul class="breadcrumb">
      <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Properties</li>
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
  <div class="warp">
    <div>
      <h1 class="title">
        Posts
        <a class="btn btn-default btn-sm text-primary" href="{{ route('rt-admin.posts.create') }}">Add New</a>
      </h1>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-legacy table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Categories</th>
            <th>Tag</th>
            <th class="td-fit">Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $i => $post)
          <tr>
            <td>{{ $i+1 }}</td>
            <td><a href="{{ route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.show', $post->id) }}">{{ $post->post_title }}</a></td>
            <td>{{ optional($post->author)->name }}</td>
            <td>{{ $post->categories }}</td>
            <td></td>
            <td>{{ $post->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('foot')

@endsection