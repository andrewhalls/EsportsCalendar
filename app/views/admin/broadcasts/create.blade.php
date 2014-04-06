@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Broadcasts
@stop

@section('page-title')
@parent
Broadcasts
@stop

{{-- Content --}}
@section('content')

{{ Form::model($broadcast, ['route' => 'admin.broadcasts.store']) }}

<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Quick Example</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title') }}
                        {{ Form::text('title', $broadcast->title, ['class' => 'form-control', 'placeholder' => 'Broadcast Title']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('game') }}
                        {{ Form::select('game_id', $games, $broadcast->game_id, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('start_at', 'Start Time') }}
                        {{ Form::text('start_at', $broadcast->start_at, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('end_at', 'End Time') }}
                        {{ Form::text('end_at', $broadcast->end_at, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description') }}
                        {{ Form::textArea('description', $broadcast->description, ['class' => 'form-control', 'rows' => '3']) }}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->

    </div>

</div>

{{ Form::close() }}

</section><!-- /.content -->
@stop

