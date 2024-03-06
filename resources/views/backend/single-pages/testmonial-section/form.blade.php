@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Testmonial</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{ isset($testmonials) ? route('app.testmonial.update',$testmonials->id) : route('app.testmonial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($testmonials)
                        @method('PATCH')
                        <input hidden name="update_id" value="{{ $testmonials->id }}">
                        @php
                            $data=json_decode($testmonials->data);
                        @endphp
                    @endisset

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Testmonial Name</label>
                                <input class="form-control" type="text" name="testmonial_name" placeholder="name" value="{{ $data->testmonial_name ?? '' }}">
                                <div>
                                    @error('testmonial_name')
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-label" class="required">Description</label>
                                <textarea class="form-control" id="description_note" name="description" rows="4">{{ $data->description ?? '' }}</textarea>
                                <div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Image</label>
                                <input type="file" name="image" class="form-control">
                                <div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @isset($testmonials)
                                <img style="width: 60px; height: 60px;" src="{{ asset('Backend/images/homepages/testmonial_image/'.$data->image) }}" alt="{{ $data->testmonial_name }}">
                                <input type="hidden" name="image_old" id="image_old" value="{{ asset('Backend/images/homepages/testmonial_image/'.$data->image) }}">
                                @endisset
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($testmonials)
                                        {{ $testmonials->status == 1 ? 'selected' : '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($testmonials)
                                    {{ $testmonials->status == 2 ? 'selected' : '' }}
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

@endpush
