@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Setting</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{route('admin.setting.updateOrcreate')}}" method="POST">
                    @csrf
                    @isset($settings)
                        <input type="hidden" name="update_id" value="{{ $settings->id ?? ''  }}">
                    @endisset
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Key</label>
                                <input class="form-control" type="text" name="key_name" placeholder="key" value="{{ $settings->key_name ?? '' }}">
                                <div>
                                    @error('key_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Value</label>
                                <input class="form-control" type="text" name="value" placeholder="value" value="{{ $settings->value ?? '' }}">
                                <div>
                                    @error('value')
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
