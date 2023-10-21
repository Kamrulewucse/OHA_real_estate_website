@extends('layouts.admin')

@section('title')
    Edit Portfolio
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Portfolio Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.edit_portfolio',['portfolio'=>$portfolio->id]) }}">
                    @csrf

                    <div class="box-body">
                        <div class="form-group {{ $errors->has('type') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Type </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" id="type">
                                    <option value="">Select Type</option>
                                    <option {{ $portfolio->type == 1 ? 'selected' :  '' }} value="1">Residential</option>
                                    <option {{ $portfolio->type == 2 ? 'selected' :  '' }} value="2">Commercial</option>
                                    <option {{ $portfolio->type == 3 ? 'selected' :  '' }} value="3">Industrial</option>
                                    <option {{ $portfolio->type == 4 ? 'selected' :  '' }} value="4">Infrastructure</option>
                                    <option {{ $portfolio->type == 5 ? 'selected' :  '' }} value="5">Institutional</option>
                                </select>
                                @error('type')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('project') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Project *</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="project" id="project">
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ old('project',$portfolio->project_id) == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                @error('project')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('category') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Category *</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="category" id="category">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category',$portfolio->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Location Name *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Location Name"
                                       name="name" value="{{ $portfolio->name }}">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Address *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Address"
                                       name="address" value="{{ $portfolio->address }}">
                                @error('address')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('latitude') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Latitude *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Latitude"
                                       name="latitude" value="{{ $portfolio->latitude }}">
                                @error('latitude')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('longitude') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Latitude *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Latitude"
                                       name="longitude" value="{{ $portfolio->longitude }}">
                                @error('longitude')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Status *</label>
                            <div class="col-sm-10">
                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="1" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($portfolio->status == '1' ? 'checked' : '')) :
                                            (old('status') == '1' ? 'checked' : '') }}>
                                        Active
                                    </label>
                                </div>
                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="0" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($portfolio->status == '0' ? 'checked' : '')) :
                                            (old('status') == '0' ? 'checked' : '') }}>
                                        Inactive
                                    </label>
                                </div>
                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <template id="imageTemplate">
        <li>
            <div class="image-item" style="margin-right: 10px">
                <img class="img-thumbnail img" style="margin-bottom: 10px">
                <a class="btnRemoveImage">Remove</a>

                <input class="inputImageId" type="hidden" name="imagesId[]">
                <input class="inputImageSrc" type="hidden" name="imagesSrc[]">
            </div>
        </li>
    </template>
@stop

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('themes/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Sortable -->
    <script src="{{ asset('themes/backend/plugins/sortable/Sortable.min.js') }}"></script>

    <!-- CK Editor -->
    <script src="{{ asset('themes/backend/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@stop

