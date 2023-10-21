@extends('layouts.admin')

@section('title')
    Portfolio
@stop
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
                <div class="box-header">
                    <a class="btn btn-primary" href="{{ route('admin.add_portfolio') }}">Add Portfolio</a>

                </div>
                <div class="box-body table-responsive">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($portfolios as $portfolio)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($portfolio->type == 1)
                                        <span class="text-success">Residential</span>
                                    @elseif($portfolio->type == 2)
                                        <span class="text-warning">Commercial</span>
                                    @elseif($portfolio->type == 3)
                                        <span class="text-warning">Industrial</span>
                                    @elseif($portfolio->type == 4)
                                        <span class="text-warning">Infrastructure</span>
                                    @else
                                        <span class="text-warning">Institutional</span>
                                    @endif
                                </td>
                                <td>{{ $portfolio->name }}</td>
                                <td>{{ $portfolio->address }}</td>
                                <td>
                                    @if($portfolio->status == 1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.edit_portfolio',['portfolio'=>$portfolio->id]) }}"><i class="fa fa-pencil"></i></a>
                                    <a role="button" data-id="{{ $portfolio->id }}" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@stop

@section('script')
    <!-- DataTables -->
    <script src="{{ asset('themes/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('themes/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#table').DataTable();
        })
    </script>
    <script>
        $(function () {
            var selectedId;

            $('body').on('click', '.btn-delete', function () {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "Post",
                            url: "{{ route('admin.delete_portfolio') }}",
                            data: { id: id }
                        }).done(function( response ) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                            }
                        });
                    }
                })
            });

        });
    </script>
@stop
