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

{{ Form::model($broadcast, ['route' => ['admin.broadcasts.update', $broadcast->id], 'method' => 'PUT']) }}

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
                        {{ Form::label('title') }}
                        {{ Form::text('title', $broadcast->title, ['class' => 'form-control', 'placeholder' =>
                        'Broadcast Title']) }}
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
                        {{ Form::textArea('description', $broadcast->description, ['class' => 'form-control', 'rows' =>
                        '3']) }}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
        <!-- /.box -->

    </div>

    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">Match Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @foreach($broadcast->matches as $id => $match)
                <h4>Match - {{ $id + 1 }}</h4>

                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('team_a', 'Home Team') }}
                        {{ Form::select('team_a', $teams, $broadcast->channel->id, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('team_b', 'Away Team') }}
                        {{ Form::select('team_b', $teams, $broadcast->channel->id, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Map') }}
                    {{ Form::select('map', $games, $broadcast->channel->id, ['class' => 'form-control']) }}
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('start_at', 'Start Time') }}
                        {{ Form::text('start_at', $broadcast->start_at, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('end_at', 'End Time') }}
                        {{ Form::text('end_at', $broadcast->end_at, ['class' => 'form-control']) }}
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">Channel Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('channel') }}
                    {{ Form::select('channel', $channels, $broadcast->channel->id, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('language') }}
                    {{ Form::select('language', $broadcast->channel->languages, $broadcast->channel->defaultLanguage,
                    ['class' => 'form-control']) }}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

{{ Form::close() }}

</section><!-- /.content -->
@stop

