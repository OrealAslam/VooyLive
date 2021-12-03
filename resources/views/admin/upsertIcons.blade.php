@extends('layouts.adminLayout')
@section('content')

<link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
<link href="{{ asset('css/selectize.default.css') }}" rel="stylesheet">
<link href="{{ asset('css/selectize-normalize.css') }}" rel="stylesheet">

<style>
.icon-container {
    width:64px;
    height: 64px;
}
.icon-container svg{
    width:64px;
    height: 64px;
}

.selectize-control::before {
  font-family: 'FontAwesome';
  -moz-transition: opacity 0.2s;
  -webkit-transition: opacity 0.2s;
  transition: opacity 0.2s;
  content: ' ';
  z-index: 2;
  position: absolute;
  display: block;
  top: 50%;
  right: 8px;
  width: 16px;
  height: 16px;
  margin: -10px 0 0 0;
  line-height: 16px;
  text-align: center;
  content: "\f110";
  opacity: 0;

  -webkit-animation: spin 2s infinite linear;
  -moz-animation: spin 2s infinite linear;
  -o-animation: spin 2s infinite linear;
  animation: spin 2s infinite linear;
}

.selectize-control.loading::before {
  opacity: 1;
}

</style>

<div class="container">

    <form id="subscribe-form" class="account-form" method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ isset($data['id']) ? $data['id'] : '' }}">

        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="firstName" class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
                <input id="firstName" type="text" class="form-control" name="name" value="{{ old('name',(is_object($iconData) && $iconData->name) ? $iconData->name : '') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>
        </div>
        <div class="row  form-group{{ $errors->has('icon_file') ? ' has-error' : '' }}">
            <label for="lastName" class="col-md-4 control-label">Icon File</label>

            <div class="col-md-6">
                @if(is_object($iconData) && $iconData->icon_file && Storage::exists('/hdi_icons/'.$iconData->icon_file))
                <div class="icon-container" style="">
                    {!!Storage::get('/hdi_icons/'.$iconData->icon_file)!!}
                </div>
                @else
                    N/A
                @endif

                <br>
                <input id="lastName" type="file" class="form-control" name="icon_file" value="{{ old('icon_file',(is_object($iconData) && $iconData->icon_file) ? $iconData->icon_file : '') }}" >

                @if ($errors->has('icon_file'))
                    <span class="help-block">
                            <strong>{{ $errors->first('icon_file') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="row form-group">
            <label for="tags" class="col-md-4 control-label">Tags</label>
            <div class="col-md-6">
                <select id="tags" name="tags[]" placeholder="Start Typing..." multiple>
                    @if(is_object($iconData))
                        @foreach ($iconData->IconTags as $iconTag)
                            <option selected value="{{$iconTag->tag_id}}">{{$iconTag->Tag->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <br />
                <div class="form-group">
                    <input type="submit" value="Upsert" class="btn btn-primary pull-right">
                    <a href="{{route('HdiIcons')}}" class="btn btn-default pull-right">Cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>
@stop


@section('pageLevelJS')
<script src="{{ asset('js/selectize.js') }}"></script>
<script>
    $('#tags').selectize({
        valueField: 'id',
        labelField: 'title',
        searchField: 'title',

        create: true,
        persist: false,
        createOnBlur: true,

        maxOptions: 100,
        maxItems: null,
        //loadingClass: '',
        //options: options,
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: "{{route('HdiIcons')}}",
                type: 'POST',
                dataType: 'json',
                data: {
                    'q': query,
                    'limit': 10,
                    '_token' : "{{ csrf_token() }}"
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    //console.log(res);
                    callback(res.tags);
                }
            });
        },
        /*
        render: {
            option: function(item) {
                var tags = [];
                for (var i = 0, n = item.length; i < n; i++) {
                    tags.push(item[i]);
                }

                return '<div>' +
                    '<img src="' + escape(item.posters.thumbnail) + '" alt="">' +
                    '<span class="title">' +
                        '<span class="name">' + escape(item.title) + '</span>' +
                    '</span>' +
                    '<span class="description">' + escape(item.synopsis || 'No synopsis available at this time.') + '</span>' +
                    '<span class="actors">' + (actors.length ? 'Starring ' + actors.join(', ') : 'Actors unavailable') + '</span>' +
                '</div>';
            }
        },
        */
    });
</script>
@endsection