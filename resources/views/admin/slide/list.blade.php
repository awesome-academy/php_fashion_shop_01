@extends('admin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('text.slide') }}
                    <small>{{ __('text.list') }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>{{ __('text.image') }}</th>
                        <th>{{ __('text.link') }}</th>
                        <th>{{ __('text.delete') }}</th>
                        <th>{{ __('text.edit') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slide as $sl)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $sl->id }}</td>
                        <td>
                            <img class="img-fm" src="{{ config('image.paths.resource') }}/{{ $sl->image }}">
                        </td>
                        <td>{{ $sl->link }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('delete_slide', $sl->id) }}">{{ __('text.delete') }}</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('edit_slide', $sl->id) }}">{{ __('text.edit') }}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
