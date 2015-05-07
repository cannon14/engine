@extends('app')

@section('content')
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Parsers</li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {!! Form::open(array('url' => 'parsers', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal')) !!}
                <div class="form-group'">
                        {!! Form::label('file_to_upload', 'Upload Template', $attributes=array('class'=>'control-label col-sm-2')); !!}
                        {!! Form::file('file_to_upload', $attributes = array('class'=>'col-sm-5')); !!}
                </div>
                <div class="form-group">
                            <div class="col-sm-2">
                            <button type="submit" class="btn btn-default">Upload</button>
                            </div>
                </div>
                {!! Form::close() !!}

                        <table class="datatable">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Fields</th>
                            <th>Created</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($parsers as $parser)
                                <tr>
                                <td>{!! $parser->parser_id !!}</td>
                                <td>{!! $parser->parser_name !!}</td>
                                <td>{!! $parser->parser_description !!}</td>
                                <td>{!! $parser->parser_fields !!}</td>
                                <td>{!! $parser->created_at !!}</td>
                                <td>
                                    <div class="action_items">
                                        {!! Form::open(array('url'=>'parsers/'.$parser->parser_id.'/edit', 'method'=>'GET')) !!}
                                        <button type="submit" title="Edit Parser">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="action_items">
                                        {!! Form::open(array('url'=>'parsers/'.$parser->parser_id, 'method'=>'GET')) !!}
                                        <button type="submit" title="Show Parser">
                                            <span class="glyphicon glyphicon glyphicon-zoom-in"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="action_items">
                                        {!! Form::open(array('url'=>'parsers/'.$parser->parser_id, 'method'=>'DELETE')) !!}
                                        <button type="button" id="{!!$parser->parser_id!!}" title="Delete Parser" onclick="confirmDelete(this.id)">
                                            <span class="glyphicon glyphicon glyphicon-remove"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    <script>
    function confirmDelete(id) {
        var check = confirm("Are you sure you want to delete this Parser?");

        if(check) {
            $('#'+id).closest('form').submit();
        }
    }
    </script>
@endsection
