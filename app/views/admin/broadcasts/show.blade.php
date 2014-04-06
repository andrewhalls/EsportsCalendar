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

<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Broadcast - {{ $broadcast->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Title</dt>
                        <dd>{{ $broadcast->title}}</dd>
                    <dt>Game</dt>
                        <dd>{{ $broadcast->game->name }}</dd>
                    <dt>Start Time</dt>
                    <dd>{{ $broadcast->start_at }}</dd>
                    <dt>End Time</dt>
                    <dd>{{ $broadcast->start_at }}</dd>
                    <dt>Description</dt>
                    <dd>{{ $broadcast->description }}</dd>
                </dl>
            </div>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Match Details</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                @foreach($broadcast->matches as $id => $match)
                <h4>Match - {{ $id + 1 }}</h4>
                <dl class="dl-horizontal">
                    <dt>Start Time</dt>
                    <dd>{{ $match->start_at}}</dd>
                    <dt>End Time</dt>
                    <dd>{{ $match->end_at}}</dd>
                    <dt>Home Team</dt>
                    <dd>{{ $match->homeTeam->name}}</dd>
                    <dt>Away Team</dt>
                    <dd>{{ $match->awayTeam->name}}</dd>
                </dl>
                @endforeach
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Channel Details</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd>{{ $broadcast->channel->name }}</dd>
                    <dt>URL</dt>
                    <dd>{{ $broadcast->channel->url }}</dd>
                    <dt>Language</dt>
                    <dd>{{ $broadcast->channel->language->name }}</dd>
                </dl>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

</section><!-- /.content -->
@stop

