@extends('layouts.admin')
@section('title')
    Add News
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">News Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('admin.news.add') }}">
                    @csrf

                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
                            <label for="title" class="col-sm-2 control-label">Title <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input id="title" type="text" class="form-control" placeholder="Enter Title"
                                       name="title" value="{{ old('title') }}">

                                @error('title')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('post_date') ? 'has-error' :'' }}">
                            <label for="post_date" class="col-sm-2 control-label">Post Date & Time <span class="text-danger">*</span></label>

                            <div class="col-sm-5">
                                <input id="post_date" readonly type="text" class="form-control date-picker"
                                       name="post_date" value="{{ old('post_date',date('d-m-Y')) }}">

                                @error('post_date')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <div class="bootstrap-timepicker">
                                    <div class="input-group">
                                            <input readonly name="post_time" value="{{ old('post_time',date('h:i:s A')) }}" type="text" class="form-control timepicker">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                </div>

                                @error('post_time')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('author') ? 'has-error' :'' }}">
                            <label for="author" class="col-sm-2 control-label">Author</label>

                            <div class="col-sm-10">
                                <input id="author" type="text" class="form-control" placeholder="Enter Author"
                                       name="author" value="{{ old('author') }}">

                                @error('author')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label for="image" class="col-sm-2 control-label"> Image <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="file" id="image" class="form-control" name="image">

                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label for="editor" class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <textarea id="editor" class="form-control" name="description" rows="10">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Status <span class="text-danger">*</span></label>

                            <div class="col-sm-10">

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" checked name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                        Active
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                        Inactive
                                    </label>
                                </div>

                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    <!-- /.box-body -->
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('themes/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(function () {
            CKEDITOR.replace('editor');

        });
    </script>
    <script type="text/javascript">
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2();

        });
        function initProduct() {
            $('.select2').select2();
        }
    </script>
@endsection
