@extends('layouts.backend.index')
@section('title',$title)
@push('styles')
    <style>
        .table thead th{
            font-weight: 600 !important;
        }
        .table thead th:first-child{
            text-align: left;
        }
        .table thead th:last-child{
            text-align: right;
        }
        .table tbody tr td:last-child{
            text-align: right;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $title }}</div>
                </div>
                <div class="card-body">
                    <table class="table table-light" id="role_datatable" style="width: 100% !important;">
                        <thead>
                            <th>Sl</th>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th>Note</th>
                            <th>Created At</th>
                            <th class="text-end">Actions</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#role_datatable').DataTable({
            procession:true,
            serverSide:true,
            order:[],
            bInfo:true,
            responsive:true,
            ordering:false,
            lengthMenu:[
                [5, 10, 15, 25, 50, 100, 1000, 10000, -1]
                [5, 10, 15, 25, 50, 100, 1000, 10000, 'All']
            ],
            pageLength:25,
            ajax:{
                url: '{{ route("app.roles.get-data") }}',
                type: 'POST',
                dataType: 'json',
                data:function(d){
                    d._token = _token
                },
            },
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name'},
                {data: 'permissions'},
                {data: 'note'},
                {data: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis'],
        });
    </script>
@endpush