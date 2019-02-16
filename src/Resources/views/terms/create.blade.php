
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

  <div class="panel panel-default">
    <div class="panel-heading pt-2 pb-2">
      <h5 class="panel-title">Add New {{ title_case($taxonomy) }}
        {{ $term ? ': '.$term->name : ''}}
      </h5>
    </div>
    <div class="panel-body">
      @if(isset($term))
        {!! Form::model($term, [
          'method' => 'PUT',
          'route' => ['structures.update', $term->id],
          'enctype' => 'multipart/form-data',
          'class' => 'form-horizontal'
        ]) !!}
      @else
        <form class="form-horizontal-" method="POST" action="{{ Request::fullUrl() }}" enctype="multipart/form-data" >
      @endif
        @csrf
        <input type="hidden" name="taxonomy" value="{{ $taxonomy }}">
        <div class="form-group">
          <label class="control-label ">Name</label>
          <div class="">
            <input type="text" name="name" class="form-control input-xs" value="{{ old('name') }}">
          </div>
          <div class="">
            @if ($errors->has('name'))
              <span class="label border-left-warning label-striped">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>  
        </div>

        <div class="form-group">
          <label class="control-label ">Description</label>
          <div class="">
            <input type="text" name="description" class="form-control input-xs" value="{{ old('description') }}">
          </div>
          <div class="">
            @if ($errors->has('description'))
              <span class="label border-left-warning label-striped">
                <strong>{{ $errors->first('description') }}</strong>
              </span>
            @endif
          </div>  
        </div>
        
        <div class="form-group">
          <div class="">
            <div class="text-right">
              <button type="submit" class="btn btn-primary btn-sm"> Add New<span></span></button>
            </div>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>