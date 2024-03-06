@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Counter</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{ isset($counters) ? route('app.counter.update',$counters->id) : route('app.counter.store') }}" method="POST">
                    @csrf
                    @isset($counters)
                        @method('PATCH')
                        <input hidden name="update_id" value="{{ $counters->id }}">
                        @php
                            $data=json_decode($counters->data);
                        @endphp
                    @endisset

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Counter Number</label>
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
                                <label for="form-label" class="required">Counter Title</label>
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
                                    <option value="1" @isset($counters)
                                        {{ $counters->status == 1 ? 'selected' : '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($counters)
                                    {{ $counters->status == 2 ? 'selected' : '' }}
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
