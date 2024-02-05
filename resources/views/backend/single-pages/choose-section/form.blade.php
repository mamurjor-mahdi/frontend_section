@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Choose</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{ isset($chooses) ? route('admin.choose.update',$chooses->id) : route('admin.choose.store') }}" method="POST">
                    @csrf
                    @isset($chooses)
                        @method('PATCH')
                        <input hidden name="update_id" value="{{ $chooses->id }}">
                        @php
                            $data=json_decode($chooses->data);
                        @endphp
                    @endisset

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Number</label>
                                <input class="form-control" type="text" name="number" placeholder="number" value="{{ $data->number ?? '' }}">
                                <div>
                                    @error('number')
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($chooses)
                                        {{ $chooses->status == 1 ? 'selected' : '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($chooses)
                                    {{ $chooses->status == 2 ? 'selected' : '' }}
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
