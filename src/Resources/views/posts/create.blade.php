@extends('rt-starter-kit::layouts.admin')

@section('head')
<link href="{{ scontent('starterkit/css/bootstrap-select.min.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="content">
  {{ Breadcrumbs::render('add-property') }}
  <div class="columns mt-10 mb-0">
    <div class="column">
      <h1 class="title">Add New Post</h1>
    </div>
    <div class="column">
      {{-- <a href="{{route('users.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New User</a> --}}
    </div>
  </div>
  <hr class="mt-0">
  <form action="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.store')}}" method="post">
    @csrf
    <div class="row">
      <div class="column col-lg-9 is-three-quarters-tablet">
        <div class="form-group">
          <input type="text" name="post_title" placeholder="Post Title" class="form-control" value="{{old('post_title')}}">
        </div>

        <div class="form-group">
          <textarea type="textarea" name="post_content" class="form-control summernote" 
          placeholder="Compose your masterpiece..." rows="20"></textarea>
        </div>


        <div class="form-group">

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

            <div class="secondary-action-button btn-group">
              <button name="submit" value="draft" class="btn btn-sm button is-fullwidth">Save Draft</button>

              <button name="submit" value="publish" class="btn btn-sm button is-fullwidth">Publish</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@section('foot')

<!-- include summernote css/js -->
<link href="{{ scontent('starterkit/summernote/summernote-bs4.css') }}" rel="stylesheet">
<script src="{{ scontent('starterkit/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ scontent('starterkit/js/moment.min.js') }}"></script>
<script src="{{ scontent('starterkit/js/daterangepicker.js') }}"></script>

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
        ['height', ['height']],
        ['misc', ['fullscreen', 'codeview', 'undo', 'redo']]
      ]
    });
  })
</script>

<script src="{{ scontent('starterkit/js/bootstrap_select.min.js') }}"></script>
<script type="text/javascript">
  $(function() {
    // Single picker
   $('.daterange-single').daterangepicker({ 
     singleDatePicker: true,
     locale: {
       format: 'YYYY-MM-DD'
     }
   });
 });
</script>
@endsection