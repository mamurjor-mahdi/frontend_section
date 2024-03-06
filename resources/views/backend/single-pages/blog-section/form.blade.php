@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Blog</h4>
            </div>
            <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                <form action="{{ isset($blogs) ? route('app.blog.update',$blogs->id) : route('app.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($blogs)
                        @method('PATCH')
                        <input hidden name="update_id" value="{{ $blogs->id }}">
                        @php
                            $data=json_decode($blogs->data);
                        @endphp
                    @endisset

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Category</label>
                                <select name="category" id="cetegory" class="form-control">
                                    <option value="">Selected Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @isset($data)
                                                {{ $data->category == $category->id ? 'selected' : '' }}
                                            @endisset>{{ $category->category_name }}</option>
                                        @endforeach

                                </select>
                                <div>
                                    @error('site_url')
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
                                <label for="form-label">Button Url</label>
                                <input class="form-control" type="text" name="button_url" placeholder="button url" value="{{ $data->button_url ?? '' }}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" >Button Text</label>
                                <input class="form-control" type="text" name="button_text" placeholder="button text" value="{{ $data->button_text ?? '' }}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Button target</label>
                                <select name="button_target" class="form-control">
                                    <option value="">Select Target</option>
                                    <option value="_blank" @isset($blogs)
                                        {{ $data->button_target == "_blank" ? 'selected' : '' }}
                                    @endisset>New Tab</option>
                                    <option value="_self" @isset($blogs)
                                    {{ $data->button_target == "_self" ? 'selected' : '' }}
                                @endisset>Current Tab</option>
                                </select>

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
                                @isset($blogs)
                                <img style="width: 60px; height: 60px;" src="{{ asset('Backend/images/homepages/blog_image/'.$data->image) }}" alt="{{ $data->title ?? '' }}">
                                <input type="hidden" name="image_old" id="image_old" value="{{ asset('Backend/images/homepages/blog_image/'.$data->image) }}">
                                @endisset
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($blogs)
                                        {{ $blogs->status == 1 ? 'selected' : '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($blogs)
                                    {{ $blogs->status == 2 ? 'selected' : '' }}
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
