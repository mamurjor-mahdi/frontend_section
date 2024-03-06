@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title">Hire Me</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow rounded">
                <form action="{{ route('app.hireme.updateorCreated') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($hiremeSection)
                        <input type="hidden" name="section_name" value="{{ $hiremeSection->section_name }}">

                    @endisset
                    @php
                        if($hiremeSection !=null){
                            $data=json_decode($hiremeSection->data);
                        }
                    @endphp

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-label" class="required">Title</label>
                                <input class="form-control" type="text" name="title" placeholder="title" value="{{ $data->title ?? '' }}">
                                <div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-label" class="required">Description</label>
                                <textarea class="form-control" id="description_note" name="description" rows="4">{!! $data->description ?? '' !!}</textarea>
                                <div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Button Text</label>
                                <input class="form-control" type="text" name="button_text" placeholder="button text" value="{{ $data->button_text ?? '' }}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Button Target</label>
                                <select name="button_target" class="form-control">
                                    <option value="">Select Target</option>
                                    <option value="_blank" @isset($hiremeSection)
                                        {{ $data->button_target == "_blank" ? 'selected' : '' }}
                                    @endisset>New Tab</option>
                                    <option value="_self" @isset($hiremeSection)
                                    {{ $data->button_target == "_self" ? 'selected' : '' }}
                                @endisset>Current Tab</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Button Url</label>
                                <input class="form-control" type="text" name="button_url" placeholder="button url" value="{{ $data->button_url ?? '' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($hiremeSection)
                                    {{ $hiremeSection->status == 1 ? 'selected' : '' }}
                                @endisset>publish</option>
                                    <option value="2" @isset($hiremeSection)
                                    {{ $hiremeSection->status == 2 ? 'selected' : '' }}
                                @endisset>pending</option>
                                </select>
                                <div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#description_note*').summernote({
            height:200
        });
    });
</script>
@endpush
