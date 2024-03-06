@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
<div class="row">
    @include('backend.alert_message.alert')
    <div class="col-md-12">
        <div class="card-header form-header">
            <h4 class="card-title text-center">Category</h4>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title">{{ $title }}</div>
                <div>
                    <a href="{{ route('app.blog.category.create') }}" class="btn btn-lg btn-primary">Add New</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-light" id="role_datatable" style="width: 100% !important;">
                    <thead>
                        <th>Sl</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </thead>
                    <tbody>
                         @forelse ($categorys as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->category_name }}</td>
                                <td>{{ $value->slug }}</td>
                                <td>
                                    {!! $value->status== 1 ? '<span class="badge bg-primary">Publish</span>' : '<span class="badge bg-danger">Pending</span>' !!}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('app.blog.category.edit',$value->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('app.blog.category.delete',$value->id) }}" id="delete-form-{{ $value->id }}" method="post" enctype="multipart/form-value">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="alert_message({{ $value->id }})"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-danger text-center" colspan="6">data not found</td>
                            </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
      function alert_message(delete_id) {
    Swal.fire({
    title: "Are you sure?",
    text: "Delete!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "confirm"
    }).then((result) => {
    if (result.isConfirmed) {
                document.getElementById('delete-form-'+delete_id).submit();
            }
        });
    }

</script>
@endpush
