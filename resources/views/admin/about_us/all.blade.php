@extends('layouts.admin')

@section('title')
    About Us
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="box">
{{--                <div class="box-header with-border">--}}
{{--                    <a class="btn btn-primary" href="{{ route('admin.about_us.add') }}">Add AboutUs</a>--}}
{{--                </div>--}}
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($aboutUs as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->thumbs_image) }}" alt="{{ $item->title }}" height="50px">
                                    </td>
                                    <td>{!! $item->description !!}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.about_us.edit', ['aboutUs' => $item->id]) }}">Edit</a>
{{--                                        <a role="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}">Delete</a>--}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>

        $(function () {
            $('#table').DataTable();


        });
    </script>
@endsection
