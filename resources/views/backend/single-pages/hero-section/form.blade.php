@extends('layouts.backend.index')
@section('title',$title)
@push('styles')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .add_row_items,.remove_row_items{
            margin-top: 25px;
        }
        #row_items{
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        @include('backend.alert_message.alert')
        <div class="col-md-12">
            <div class="card-header form-header">
                <h4 class="card-title text-center">Hero</h4>
            </div>
            <div class="bg-white p-4 mb-3 shadow rounded">
                <form action="{{ route('app.hero.updateOrCreated') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($heroSection)
                        <input hidden name="section_name" value="{{ $heroSection->section_name }}">
                    @endisset
                    @php
                        if ($heroSection !=null){
                            $data=json_decode($heroSection->data);
                            $social_share=json_decode($data->social_share);
                            // dd($social_share);
                        }
                    @endphp

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Hello text</label>
                                <input class="form-control" type="text" name="hello_text" placeholder="hello text" value="{{ $data->hello_text ?? '' }}">
                                <div>
                                    @error('hello_text')
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Hire Button Target</label>
                                <select name="hire_button_target" class="form-control">
                                    <option value="">Select Target</option>
                                    <option value="_blank" @isset($heroSection)
                                        {{ $data->hire_button_target== '_blank' ? 'selected' : '' }}
                                    @endisset>New Tab</option>
                                    <option value="_self" @isset($heroSection)
                                    {{ $data->hire_button_target== '_self' ? 'selected' : '' }}
                                @endisset>Current Tab</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Hire Button Url</label>
                                <input class="form-control" type="text" name="hire_button_url" placeholder="button url" value="{{ $data->hire_button_url ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Hire Button Text</label>
                                <input class="form-control" type="text" name="hire_button_text" placeholder="button text" value="{{ $data->hire_button_text ?? '' }}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">CV Button Target</label>
                                <select name="cv_button_target" class="form-control">
                                    <option value="">Select Target</option>
                                    <option value="_blank" @isset($heroSection)
                                    {{ $data->cv_button_target== '_blank' ? 'selected' : '' }}
                                @endisset>New Tab</option>
                                    <option value="_self" @isset($heroSection)
                                    {{ $data->cv_button_target== '_self' ? 'selected' : '' }}
                                @endisset>Current Tab</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">CV Button Url</label>
                                <input class="form-control" type="text" name="cv_button_url" placeholder="button url" value="{{ $data->cv_button_url ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">CV Button Text Tow</label>
                                <input class="form-control" type="text" name="cv_button_text" placeholder="button text" value="{{ $data->cv_button_text ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label" class="required">Image</label>
                                <input class="form-control" type="file" name="image">
                                <div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @isset($data)
                                    <img style="width: 60px; height:50px" src="{{ asset('Backend/images/homepages/hero_image/'.$data->image) }}" alt="">
                                    <input type="hidden" name="image_old" id="image_id" class="form-control" value="{{ $data->image }}">
                                @endisset
                            </div>
                        </div>
                        {{-- admore filed start --}}
                       @if(isset($heroSection))
                           @foreach ($social_share as $key=>$value)
                           <div class="col-md-12">
                                <div id="row_items">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form-lebel">Social Icon</label>
                                                <input type="text" class="form-control" id="socail_icon" name="social_share[{{ $key ?? '' }}][social_icon]" value="{{ $value->social_icon ?? '' }}" placeholder="socail icon">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form-lebel">Social Url</label>
                                                <input type="text" class="form-control" id="socail_url" name="social_share[{{ $key ?? '' }}][socail_url]" value="{{ $value->socail_url ?? '' }}" placeholder="socail url">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <div class="input-group">
                                                <label for="form-lebel">Social Target</label>
                                                <select class="form-control" id="socail_target" name="social_share[{{ $key ?? '' }}][socail_target]">
                                                    <option value="">Select Target</option>
                                                    <option value="_blank" @isset($heroSection)
                                                        {{ $value->socail_target == '_blank' ? 'selected' : '' }}
                                                    @endisset>New Tab</option>
                                                    <option value="_self" @isset($heroSection)
                                                    {{ $value->socail_target == '_self' ? 'selected' : '' }}
                                                @endisset>Current Tab</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-danger remove_row_items" type="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                           <div class="col-md-12 text-right">
                            <button class="btn btn-success add_row_items" type="button"> Add Filed</button>
                        </div>
                        @else
                        <div class="col-md-12">
                            <div id="row_items">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-lebel">Social Icon</label>
                                            <input type="text" class="form-control" id="socail_icon" name="social_share[0][social_icon]" value="" placeholder="socail icon">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-lebel">Social Url</label>
                                            <input type="text" class="form-control" id="socail_url" name="social_share[0][socail_url]" value="" placeholder="socail url">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <div class="input-group">
                                            <label for="form-lebel">Social Target</label>
                                            <select class="form-control" id="socail_target" name="social_share[0][socail_target]">
                                                <option value="">Select Target</option>
                                                <option value="_blank">New Tab</option>
                                                <option value="_self">Current Tab</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-success add_row_items" type="button"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endif
                        {{-- admore filed end --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-label" class="required">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="1" @isset($heroSection)
                                        {{ $heroSection->status==1 ? 'selected' : '' }}
                                    @endisset>publish</option>
                                    <option value="2" @isset($heroSection)
                                        {{ $heroSection->status==2 ? 'selected' : '' }}
                                    @endisset>pending</option>
                                </select>
                                <div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-right">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="//code.jquery.com/jquery-1.1.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3./js/bootstrap.min.js"></script>
<script type="text/javascript">
    window.alert = function(){};
    var defaultCSS = document.getElementById('bootstrap-css');
    function changeCSS(css){
        if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
        else $('head > link').filter(':first').replaceWith(defaultCSS);
    }
    $( document ).ready(function() {
      var iframe_height = parseInt($('html').height());
      window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
    });
</script>
<script>
    var i =0;
    $(document).ready(function () {
        i++;
        $('.add_row_items').click(function (e) {
            e.preventDefault();
            $('#row_items').append(`
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-lebel">Social Icon</label>
                                            <input type="text" class="form-control" id="socail_icon" name="social_share['+i+'][social_icon]" value="" placeholder="socail icon">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-lebel">Social Url</label>
                                            <input type="text" class="form-control" id="socail_url" name="social_share['+i+'][socail_url]" value="" placeholder="socail url">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <div class="input-group">
                                            <label for="form-lebel">Social Target</label>
                                            <select class="form-control" id="socail_target" name="social_share['+i+'][socail_target]">
                                                <option value="">Select Target</option>
                                                <option value="_blank">New Tab</option>
                                                <option value="_self">Current Tab</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger remove_row_items" type="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>
            `)
         });
         $(document).on('click','.remove_row_items',function (e) {
            e.preventDefault();
            let row_items=$(this).parent().parent();
            $(row_items).remove();
          })
     })
</script>
@endpush
