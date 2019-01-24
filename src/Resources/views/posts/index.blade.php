@extends('rt-starter-kit::layouts.admin')

@section('head')

@endsection

@section('content')
<div class="content">
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
            <td>{{ $post->post_title }}</td>
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