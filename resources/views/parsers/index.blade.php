@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        {!! Form::open(array('url' => 'parsers', 'method' => 'post', 'files' => true)) !!}
                        {!! Form::label('file_to_upload', 'Upload Template'); !!}
                        {!! Form::file('file_to_upload', $attributes = array()); !!}
                        <br>
                        {!! Form::submit('Upload!'); !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
