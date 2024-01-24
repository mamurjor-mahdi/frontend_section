@extends('layouts.backend.index')
@section('title',$title)
@push('styles')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .addmore_btn{
            margin-top: 25px !important;
        }
        #education_fields{
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('backend.alert_message.alert')
            <form action="{{ route('hero.form.updateorCreated') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($heroSection)
                    <input hidden name="section_name" value="{{ $heroSection->section_name }}">
                @endisset
                @php
                    if ($heroSection !=null){
                        $data=json_decode($heroSection->data);
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
                            <input class="form-control" type="file" name="hero_image">
                            <div>
                                @error('hero_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @isset($heroSection)
                            <img style="width: 60px; height:50px" src="{{ asset('Backend/images/homepages/hero_image/'.$data->hero_image) }}" alt="">
                            <input hidden name="hero_image_old" id="hero_image_old" class="form-control">
                        @endisset
                    </div>
                    {{-- admore filed start --}}
                    <div id="education_fields">
                
                    </div>
                    <div class="col-md-4 nopadding">
                        <div class="form-group">
                            <label for="form-lebel">Social Icon</label>
                            <input type="text" class="form-control" id="socail_icon" name="social_share[0][social_share]" value="" placeholder="socail icon">
                        </div>
                    </div>
                    <div class="col-md-4 nopadding">
                        <div class="form-group">
                            <label for="form-lebel">Social Url</label>
                            <input type="text" class="form-control" id="socail_url" name="social_share[0][socail_url]" value="" placeholder="socail url">
                        </div>
                    </div>
                    <div class="col-md-4 nopadding">
                        <div class="form-group">
                          <div class="input-group">
                            <label for="form-lebel">Social Target</label>
                            <select class="form-control" id="socail_target" name="social_share[0][socail_target]">
                                <option value="">Select Target</option>
                                <option value="_blank">New Tab</option>
                                <option value="_self">Current Tab</option>
                            </select>
                            <div class="input-group-btn align-self-end">
                              <button class="btn btn-success addmore_btn" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                            </div>
                          </div>
                        </div>
                    </div>
                    
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
@endsection
@push('scripts')
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
    var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-md-4 nopadding"><div class="form-group"><label for="form-lebel">Social Icon</label> <input type="text" class="form-control" id="socail_icon" name="social_share['+ room +'][socail_icon]" value="" placeholder="socail icon" /></div></div><div class="col-md-4 nopadding"><div class="form-group"><label for="form-lebel">Social Url</label> <input type="text" class="form-control" id="socail_url" name="social_share['+ room +'][socail_url]" value="" placeholder="socail url" /></div></div><div class="col-md-4 nopadding"><div class="form-group"><div class="input-group"><label for="form-lebel">Social Target</label><select class="form-control" id="socail_target" name="social_share['+ room +'][socail_target]"><option value="">Select Target</option><option value="_blank">New Tab</option><option value="_self">Current Tab</option></select><div class="input-group-btn"> <button class="btn btn-danger addmore_btn" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
@endpush
