@extends('layouts.admin')

@section('title','Password Change')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Password Change Information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('admin.password_change') }}">
                    @csrf

                    <div class="box-body">
                        <div class="form-group {{ $errors->has('old_password') ? 'has-error' :'' }}">
                            <label for="old_password" class="col-sm-2 control-label">Old password <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="password" id="old_password" class="form-control" placeholder="Enter Old Password"
                                       name="old_password" value="{{ old('old_password') }}">

                                @error('old_password')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password') ? 'has-error' :'' }}">
                            <label for="new_password" class="col-sm-2 control-label">New Password <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="password" id="new_password" class="form-control" placeholder="Enter New Password"
                                       name="new_password">

                                @error('new_password')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password <span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <input type="password" id="password_confirmation" class="form-control" placeholder="Enter Confirm Password"
                                       name="password_confirmation">
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
@endsection


