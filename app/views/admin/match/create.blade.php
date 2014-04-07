@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Create Match
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
	{{ Form::open(array('action' => 'MatchController@store')) }}
        <h2>Create New Match</h2>
    
        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        {{ Form::submit('Create New Group', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
    </div>
</div>

@stop