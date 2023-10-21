@extends('layouts.admin')
@section('title')
    Add About Us
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">About Us Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('admin.about_us.add') }}">
                    @csrf

                    <div class="box-body">
                        <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label for="editor" class="col-sm-2 control-label">Description <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <textarea id="editor" class="form-control" name="description" rows="10">{{ old('description') }}</textarea>

                                @error('description')
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
