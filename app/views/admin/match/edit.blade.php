@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Group
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        {{ Form::open(array('action' => array('MatchController@update', $match->id), 'method' => 'put')) }}
        <h2>Edit Group</h2>

        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', $match->name, array('class' => 'form-control', 'placeholder' => 'Name')) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        {{ Form::label('Permissions') }}
        <?php
        $permissions = $group->getPermissions();
        if (!array_key_exists('admin', $permissions)) {
            $permissions['admin'] = 0;
        }
        if (!array_key_exists('users', $permissions)) {
            $permissions['users'] = 0;
        }
        ?>

        {{ Form::hidden('id', $match->id) }}
        {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
</div>

@stop