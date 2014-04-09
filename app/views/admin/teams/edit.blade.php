@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Team
@stop

@section('page-title')
@parent
Edit Team
@stop

{{-- Content --}}
@section('content')

{{ Form::model($team, ['route' => ['admin.teams.update', $team->id], 'method' => 'PUT']) }}

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <!-- /.box -->

    </div>

</div>

{{ Form::close() }}

</section><!-- /.content -->
@stop

