@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title">Map Address</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow rounded">
                <form action="{{ route('admin.mapaddress.updateorCreated') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($mapaddressSection)
                        <input type="hidden" name="section_name" value="{{ $mapaddressSection->section_name }}">

                    @endisset
                    @php
                        if($mapaddressSection !=null){
                            $data=json_decode($mapaddressSection->data);
                        }
                    @endphp

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Location Title</label>
                                <input class="form-control" type="text" name="location_title" placeholder="location title" value="{{ $data->location_title ?? '' }}">
                                <div>
                                    @error('location_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Location Address</label>
                                <input class="form-control" type="text" name="address" placeholder="location address" value="{{ $data->address ?? '' }}">
                                <div>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Number Title</label>
                                <input class="form-control" type="text" name="number_title" placeholder="number title" value="{{ $data->number_title ?? '' }}">
                                <div>
                                    @error('number_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Number</label>
                                <input class="form-control" type="number" name="number" placeholder="number" value="{{ $data->number ?? '' }}">
                                <div>
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Email Title</label>
                                <input class="form-control" type="text" name="email_title" placeholder="email title" value="{{ $data->email_title ?? '' }}">
                                <div>
                                    @error('email_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Email</label>
                                <input class="form-control" type="email" name="email" placeholder="email" value="{{ $data->email ?? '' }}">
                                <div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Map Url</label>
                                <input class="form-control" type="url" name="map_url" placeholder="map url" value="{{ $data->map_url ?? '' }}">
                                <div>
                                    @error('map_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($mapaddressSection)
                                    {{ $mapaddressSection->status == 1 ? 'selected' : '' }}
                                @endisset>publish</option>
                                    <option value="2" @isset($mapaddressSection)
                                    {{ $mapaddressSection->status == 2 ? 'selected' : '' }}
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
