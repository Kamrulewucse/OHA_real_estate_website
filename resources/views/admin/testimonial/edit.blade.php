@extends('layouts.admin')

@section('title')
    Edit Testimonial
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Testimonial Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.testimonial.edit',['testimonial'=>$testimonial->id]) }}">
                    @csrf

                    <div class="box-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Name *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Name"
                                       name="name" value="{{ old('name',$testimonial->name) }}">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Designation *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Designation"
                                       name="designation" value="{{ old('designation',$testimonial->designation) }}">
                                @error('designation')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('sort') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Sort *</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Sort"
                                       name="sort" value="{{ old('sort',$testimonial->sort) }}">
                                @error('sort')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">
                                @if(file_exists(public_path($testimonial->image)))
                                <img height="200px" src="{{ asset($testimonial->image) }}" alt="">
                                @endif
                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('feedback') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Feedback *</label>
                            <div class="col-sm-10">
                                <textarea type="text" rows="4" class="form-control" placeholder="Enter Feedback"
                                          name="feedback">{{ old('feedback',$testimonial->feedback) }}</textarea>
                                @error('feedback')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 control-label">Status *</label>
                            <div class="col-sm-10">
                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="1" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($testimonial->status == '1' ? 'checked' : '')) :
                                            (old('status') == '1' ? 'checked' : '') }}>
                                        Active
                                    </label>
                                </div>
                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="0" {{ empty(old('status')) ? ($errors->has('status') ? '' : ($testimonial->status == '0' ? 'checked' : '')) :
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
@stop


