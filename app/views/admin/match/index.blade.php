@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Matches
@stop

@section('page-title')
@parent
Matches
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Matches</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($matches as $match)
                    <tr>
                        <td>{{ $match->name }}</td>
                        <td>X</td>
                    </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

</section><!-- /.content -->
@stop

