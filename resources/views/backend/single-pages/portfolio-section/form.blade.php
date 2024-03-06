@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Portfolio</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{ isset($portfolios) ? route('app.portfolio.update',$portfolios->id) : route('app.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($portfolios)
                        @method('PATCH')
                        <input hidden name="update_id" value="{{ $portfolios->id }}">
                        @php
                            $data=json_decode($portfolios->data);
                        @endphp
                    @endisset

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Title</label>
                                <input class="form-control" type="text" name="title" placeholder="name" value="{{ $data->title ?? '' }}">
                                <div>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Site Url</label>
                                <input class="form-control" type="text" name="site_url" placeholder="site url" value="{{ $data->site_url ?? '' }}">
                                <div>
                                    @error('site_url')
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
                                @isset($data)
                                <img style="width: 60px; height: 60px;" src="{{ asset('Backend/images/homepages/portfolio_image/'.$data->image) }}" alt="{{ $data->title ?? '' }}">
                                <input type="hidden" name="image_old" id="image_old" value="{{ asset('Backend/images/homepages/portfolio_image/'.$data->image) }}">
                                @endisset
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($portfolios)
                                        {{ $portfolios->status == 1 ? 'selected' : '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($portfolios)
                                    {{ $portfolios->status == 2 ? 'selected' : '' }}
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
