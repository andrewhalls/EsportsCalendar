@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Games
@stop

@section('page-title')
@parent
Games
@stop

{{-- Content --}}
@section('content')

{{ Form::model($game, ['route' => 'admin.games.store']) }}

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
                        {{ Form::label('name') }}
                        {{ Form::text('name', $game->name, ['class' => 'form-control', 'placeholder' => 'Game Name Title']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('url', 'Website') }}
                        {{ Form::text('url', $game->url, ['class' => 'form-control']) }}
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

