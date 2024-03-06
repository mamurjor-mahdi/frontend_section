@extends('layouts.backend.index')
@section('title',$title)
@push('styles')

@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Common Title</h4>
            </div>
            <form action="{{ route('app.pagetitle.updateorCreated') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($singlepagetitle)
                    <input hidden name="section_name" value="{{ $singlepagetitle->section_name }}">
                @endisset
                @php
                    if($singlepagetitle !=null){
                        $data=json_decode($singlepagetitle->data);
                    };
                @endphp
                <div class="row">

                    {{--=== service title start ====--}}
                    <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                        <div class="row">
                            <div class="w-100">
                                <h4>Service Title</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Sub Title</label>
                                    <input class="form-control" type="text" name="service_sub_title" placeholder="sub title" value="{{ $data->service_sub_title ?? '' }}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label" class="required">Title</label>
                                    <input class="form-control" type="text" name="service_title" placeholder="title" value="{{ $data->service_title ?? '' }}">
                                    <div>
                                        @error('service_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label" class="required">Description</label>
                                    <textarea class="form-control" id="description_note" name="service_description" rows="4">{{ $data->service_description ?? '' }}</textarea>
                                    <div>
                                        @error('service_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=== service title end ====--}}

                    {{--=== Why choose start ====--}}
                    <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                        <div class="row">
                            <div class="w-100">
                                <h4>Why Choose Title</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Sub Title</label>
                                    <input class="form-control" type="text" name="whychoose_sub_title" placeholder="sub title" value="{{ $data->whychoose_sub_title ?? '' }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label" class="required">Title</label>
                                    <input class="form-control" type="text" name="whychoose_title" placeholder="title" value="{{ $data->whychoose_title ?? '' }}">
                                    <div>
                                        @error('whychoose_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label" class="required">Description</label>
                                    <textarea class="form-control" id="description_note" name="whychoose_description" rows="4">{{ $data->whychoose_description ?? '' }}</textarea>
                                    <div>
                                        @error('whychoose_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=== Why choose end ====--}}

                    {{--=== Portfolio start ====--}}
                    <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                        <div class="row">
                            <div class="w-100">
                                <h4>Portfolio Title</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Sub Title</label>
                                    <input class="form-control" type="text" name="portfolio_sub_title" placeholder="sub title" value="{{ $data->portfolio_sub_title ?? '' }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label" class="required">Title</label>
                                    <input class="form-control" type="text" name="portfolio_title" placeholder="title" value="{{ $data->portfolio_title ?? '' }}">
                                    <div>
                                        @error('portfolio_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label" class="required">Description</label>
                                    <textarea class="form-control" id="description_note" name="portfolio_description" rows="4">{{ $data->portfolio_description ?? '' }}</textarea>
                                    <div>
                                        @error('portfolio_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=== Portfolio end ====--}}
                     {{--=== Testmonial start ====--}}
                     <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                        <div class="row">
                            <div class="w-100">
                                <h4>Testmonial Title</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Sub Title</label>
                                    <input class="form-control" type="text" name="testmonial_sub_title" placeholder="sub title" value="{{ $data->testmonial_sub_title ?? '' }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label" class="required">Title</label>
                                    <input class="form-control" type="text" name="testmonial_title" placeholder="title" value="{{ $data->testmonial_title ?? '' }}">
                                    <div>
                                        @error('testmonial_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label" class="required">Description</label>
                                    <textarea class="form-control" id="description_note" name="testmonial_description" rows="4">{{ $data->testmonial_description ?? '' }}</textarea>
                                    <div>
                                        @error('testmonial_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=== testmonial end ====--}}
                    {{--=== Blogs start ====--}}
                    <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                        <div class="row">
                            <div class="w-100">
                                <h4>Blogs Title</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Sub Title</label>
                                    <input class="form-control" type="text" name="blogs_sub_title" placeholder="sub title" value="{{ $data->blogs_sub_title ?? '' }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label" class="required">Title</label>
                                    <input class="form-control" type="text" name="blogs_title" placeholder="title" value="{{ $data->blogs_title ?? '' }}">
                                    <div>
                                        @error('blogs_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label" class="required">Description</label>
                                    <textarea class="form-control" id="description_note" name="blogs_description" rows="4">{{ $data->blogs_description ?? '' }}</textarea>
                                    <div>
                                        @error('blogs_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=== Blogs end ====--}}
                    {{--=== contact start ====--}}
                    <div class="bg-white px-4 py-3 mb-3 shadow-sm rounded">
                        <div class="row">
                            <div class="w-100">
                                <h4>Contact Title</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Sub Title</label>
                                    <input class="form-control" type="text" name="contact_sub_title" placeholder="sub title" value="{{ $data->contact_sub_title ?? '' }}">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label" class="required">Title</label>
                                    <input class="form-control" type="text" name="contact_title" placeholder="title" value="{{ $data->contact_title ?? '' }}">
                                    <div>
                                        @error('contact_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label" class="required">Description</label>
                                    <textarea class="form-control" id="description_note" name="contact_description" rows="4">{{ $data->contact_description ?? '' }}</textarea>
                                    <div>
                                        @error('contact_description')
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
                                        <option value="1" @isset($singlepagetitle)
                                            {{ $singlepagetitle->status == 1 ? 'selected' : '' }}
                                        @endisset>publish</option>
                                        <option value="2" @isset($singlepagetitle)
                                        {{ $singlepagetitle->status == 2 ? 'selected' : '' }}
                                    @endisset>pending</option>
                                    </select>
                                    <div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=== contact end ====--}}

                    <div class="col-md-12 text-right">
                       <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>

                </div>
            </form>
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
