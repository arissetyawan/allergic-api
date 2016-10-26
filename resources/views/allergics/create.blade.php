@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Allergics / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('allergics.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('avoid')) has-error @endif">
                       <label for="avoid-field">Avoid</label>
                    <input type="text" id="avoid-field" name="avoid" class="form-control" value="{{ old("avoid") }}"/>
                       @if($errors->has("avoid"))
                        <span class="help-block">{{ $errors->first("avoid") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('take_care')) has-error @endif">
                       <label for="take_care-field">Take_care</label>
                    <input type="text" id="take_care-field" name="take_care" class="form-control" value="{{ old("take_care") }}"/>
                       @if($errors->has("take_care"))
                        <span class="help-block">{{ $errors->first("take_care") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('allergics.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
