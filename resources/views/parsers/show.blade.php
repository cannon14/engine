@extends('app')

@section('content')
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="/parsers">Parsers</a></li>
      <li class="active">Show Parser</li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-right">
                <strong>ID:</strong>
            </div>
            <div class="col-md-10">
                {!! $parser->parser_id !!}
            </div>
        </div><!--row-->
        <div class="row">
            <div class="col-md-2 text-right">
                <strong>Name:</strong>
            </div>
            <div class="col-md-10">
                {!! $parser->parser_name !!}
            </div>
        </div><!--row-->
        <div class="row">
            <div class="col-md-2 text-right">
                <strong>Description:</strong>
            </div>
            <div class="col-md-10">
                {!! $parser->parser_description !!}
            </div>
        </div><!--row-->
        <div class="row">
            <div class="col-md-2 text-right">
                <strong>Date Created:</strong>
            </div>
            <div class="col-md-10">
                {!! $parser->created_at !!}
            </div>
        </div><!--row-->
    </div>

    <script>
@endsection
