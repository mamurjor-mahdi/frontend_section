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
                <form action="{{route('app.setting.updateOrcreate')}}" method="POST">
                    @csrf
                    @isset($settings)
                        <input type="hidden" name="update_id" value="{{ $settings->id ?? ''  }}">
                    @endisset
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Footer Copyright</h5>
                            <p class="mb-0 text-muted text-mark">Footer copyright text</p>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea class="form-control" name="footer_copyright" placeholder="Footer Copyright" >{{ config('settings.footer_copyright') ?? '' }}</textarea>
                                <div>
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
