@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Teams
@stop

@section('page-title')
@parent
Teams
@stop

{{-- Content --}}
@section('content')

<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title">All Teams</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Logo</th>
    <th>Name</th>
    <th>Website</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>

@foreach($teams as $team)
<tr>
    <td>{{ $team->logo }}</td>
    <td>{{ $team->name }}</td>
    <td>{{ $team->website }}</td>
    <td>X</td>
</tr>
@endforeach

</tbody>
<tfoot>
<tr>
    <th>Logo</th>
    <th>Name</th>
    <th>Website</th>
    <th>Actions</th>
</tr>
</tfoot>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

<div class="pull-right">
    <a href="{{ URL::route('admin.teams.create') }}" class="btn btn-success btn-lg">Add New Team</a>
</div>
</section><!-- /.content -->
@stop

