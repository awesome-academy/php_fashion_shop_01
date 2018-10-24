@extends('admin.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('text.slide') }}
                    <small>{{ $slide->name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{ $err }}<br>
                    @endforeach
                </div>
                @endif

                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                {!! Form::open(['url' => 'admin/slide/edit/' . $slide->id, 'files' => 'true']) !!}
                <div class="form-group">
                    {!! Form::label('link', trans('text.link')) !!}
                    {!! Form::text('link', $slide->link, array('class' => 'form-control')) !!}
                </div>
                <div  class="form-group">
                    {!! Form::label('image', trans('text.image')) !!}
                    <p><img class="img-fm" src="{{ config('image.paths.resource') }}/{{ $slide->image }}"></p>
                    {!! Form::file('image', ['class' => 'dropify']) !!}
                </div>

                {!! Form::submit(trans('text.edit'), ['class' => 'btn btn-default']) !!}
                {!! Form::reset(trans('text.reset'), ['class' => 'btn btn-default']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection