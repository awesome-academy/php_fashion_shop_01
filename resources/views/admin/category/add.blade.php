@extends('admin.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! __('text.category') !!}
                        <small>{!! __('text.add') !!}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $message)
                            {{ $message }}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                @endif
                    {!! Form::open(['route' => 'postAddCategory', 'method' => 'post' ]) !!}
                        @csrf
                        <div class="form-group">
                            {!! Form::label(null, __('text.category_name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('text.enter_category_name')]) !!}
                        </div>
                        <div class="form-group">
                            @foreach ($list_top_category as $cat)
                                {!! Form::label(null, null, ['class' => 'radio-inline']) !!}
                                {!! Form::radio('top_category', $cat->id) !!} {{ $cat->name }}
                            @endforeach
                        </div> 
                        <div class="form-group">
                            {!! Form::label(null, __('text.parent_category')) !!}
                            {!! Form::select('parent_category', [''], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label(null, __('text.priority')) !!}
                            {!! Form::text('priority', null, ['class' => 'form-control', 'placeholder' => __('text.input_1,2')]) !!}
                        </div>
                        {!! Form::submit(__('text.add_category'), ['class' => ['btn', 'btn-default']]) !!}
                        {!! Form::reset(__('text.reset'), ['class' => ['btn', 'btn-default']]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script type="text/javascript" src="{!! asset('js/add_category.js') !!}"></script>
@endsection
