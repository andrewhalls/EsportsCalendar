@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Team - {{ $team->name }}
@stop

@section('page-title')
@parent
Team - {{ $team->name }}
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Team - {{ $team->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd>{{ $team->name }}</dd>
                    <dt>Website</dt>
                    <dd>{{ $team->url }}</dd>
                </dl>
            </div>
        </div>
        <!-- /.box -->
    </div>

</div>


<div class="pull-right">
    <a href="{{ URL::route('admin.teams.edit', $team->id ) }}" class="btn btn-warning btn-lg">Edit Team</a>
    <a href="{{ URL::route('admin.teams.edit', $team->id ) }}" class="btn btn-danger btn-lg">Delete Team</a>
</div>
</section><!-- /.content -->
@stop

