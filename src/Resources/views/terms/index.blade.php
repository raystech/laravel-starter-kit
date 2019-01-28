@extends('rt-starter-kit::layouts.admin')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-4">
      @includeIf('rt-starter-kit::terms.create')
    </div>
    <div class="col-md-8">
      <div class="panel">
        <div class="table-responsive">
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($term_taxonomy as $i => $term)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>
                    <a href="{{route('structures.index', ['term_id'=> $term->term_id])}}">{{ $term->term->name }}</a>
                  </td>
                  <td>{{ $term->term->slug }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="#" class="btn btn-default btn-sm text-danger">Edit</a>
                      <a href="#" class="btn btn-default btn-sm">Remove</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection