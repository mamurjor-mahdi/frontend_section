@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
<div class="row">
    @include('backend.alert_message.alert')
    <div class="col-md-12">
        <div class="card-header form-header">
            <h4 class="card-title text-center">Contact</h4>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title">{{ $title }}</div>
            </div>
            <div class="card-body">
                <table class="table table-light" id="role_datatable" style="width: 100% !important;">
                    <thead>
                        <th>Sl</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </thead>
                    <tbody>
                        @forelse ($contactmail as $key=>$value)
                        @php
                            $data=json_decode($value->data);
                        @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data->your_email }}</td>
                                
                                <td class="d-flex">
                                    <form action="{{ route('app.contact.delete',$value->id) }}" id="delete-form-{{ $value->id }}" method="post">
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
