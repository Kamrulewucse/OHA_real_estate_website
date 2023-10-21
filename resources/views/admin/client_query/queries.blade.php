@extends('layouts.admin')

@section('title')
    Client Query
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box card-outline card-default">
                <!-- /.card-header -->
                <div class="box-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Created at</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Location</th>
                                <th>Approximate Working Space/Area</th>
                                <th>Service</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($queries as $query)
                                <tr>
                                    <td>{{ $query->created_at->format('d-m-Y, h:i A') }}</td>
                                    <td>{{ $query->name }}</td>
                                    <td>{{ $query->email }}</td>
                                    <td>{{ $query->mobile_no }}</td>
                                    <td>{{ $query->location }}</td>
                                    <td>{{ $query->approx_area }}</td>
                                    <td>
                                        @if($query->service == 1)
                                             Interior
                                        @elseif($query->service == 2)
                                            Building
                                        @else
                                            Construction
                                        @endif
                                    </td>
{{--                                    <td>{{ $query->service}}</td>--}}
                                    <td>{{ $query->message }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#table').DataTable({
                "responsive": true, "autoWidth": false,
                order: [[0, 'desc']],
            });

        });
    </script>
@endsection
