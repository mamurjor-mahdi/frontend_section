@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('backend.alert_message.alert')
            <form action="{{ route('form.updateorCreated') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($heroSection)
                    <input hidden name="section_name" value="{{ $heroSection->section_name }}">
                @endisset
                @php
                    if ($heroSection !=null){
                        $data=json_decode($heroSection->data);
                    }
                @endphp
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label" class="required">Hello text</label>
                            <input class="form-control" type="text" name="hello_text" placeholder="hello text" value="{{ $data->hello_text ?? '' }}">
                            <div>
                                @error('hello_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label" class="required">Designation</label>
                            <input class="form-control" type="text" name="designation" placeholder="designation" value="{{ $data->designation ?? '' }}">
                            <div>
                                @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label">Hire Button Target</label>
                            <input class="form-control" type="text" name="hire_button_target" placeholder="button target" value="{{ $data->hire_button_target ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label">Hire Button Url</label>
                            <input class="form-control" type="text" name="hire_button_url" placeholder="button url" value="{{ $data->hire_button_url ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label">Hire Button Text</label>
                            <input class="form-control" type="text" name="hire_button_text" placeholder="button text" value="{{ $data->hire_button_text ?? '' }}">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label">CV Button Target</label>
                            <input class="form-control" type="text" name="cv_button_target" placeholder="button target" value="{{ $data->cv_button_target ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label">CV Button Url</label>
                            <input class="form-control" type="text" name="cv_button_url" placeholder="button url" value="{{ $data->cv_button_url ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label">CV Button Text Tow</label>
                            <input class="form-control" type="text" name="cv_button_text" placeholder="button text" value="{{ $data->cv_button_text ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-label" class="required">Image</label>
                            <input class="form-control" type="file" name="hero_image">
                            <div>
                                @error('hero_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form-label" class="required">Status</label>
                            <select name="status" class="form-control">
                                <option value="">Selecte status</option>
                                <option value="1" @isset($heroSection)
                                    {{ $heroSection->status==1 ? 'selected' : '' }}
                                @endisset>publish</option>
                                <option value="2" @isset($heroSection)
                                    {{ $heroSection->status==2 ? 'selected' : '' }}
                                @endisset>pending</option>
                            </select>
                            <div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3 text-right">
                       <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
