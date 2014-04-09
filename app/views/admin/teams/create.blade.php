@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Create Team
@stop

@section('page-title')
@parent
Create Team
@stop

{{-- Content --}}
@section('content')

{{ Form::model($team, ['route' => 'admin.teams.store']) }}

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name') }}
                    {{ Form::text('name', $team->name, ['class' => 'form-control', 'placeholder' => 'Team Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('url', 'Website') }}
                    {{ Form::text('url', $team->url, ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'create-team']) }}
            </div>

        </div>
        <!-- /.box -->

    </div>

</div>

{{ Form::close() }}

</section><!-- /.content -->
@stop

