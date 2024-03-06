@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Category</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{ isset($categorys) ? route('app.blog.category.update',$categorys->id) : route('app.blog.category.store') }}" method="POST">
                    @csrf
                    @isset($categorys)
                    @method('PATCH')
                        <input type="hidden" name="update_id" id="{{ $categorys->id }}">
                    @endisset
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Category Name</label>
                                <input class="form-control" type="text" name="category_name" placeholder="name" value="{{ $categorys->category_name ?? '' }}">
                                <div>
                                    @error('category_name')
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
                                    <option value="1" @isset($categorys)
                                    {{ $categorys->status == 1 ? 'selected': '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($categorys)
                                    {{ $categorys->status == 2 ? 'selected': '' }}
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
