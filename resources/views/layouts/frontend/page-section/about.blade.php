@if (!empty($about_sections))
@php
    $about_section=json_decode($about_sections->data)
@endphp
    <section id="about" class="section mt-3">
        <div class="container mt-5">
            <div class="row text-center text-md-left">
                <div class="col-md-3">
                    <img src="{{ asset('backend/images/homepages/about_image/'.$about_section->image) }}" alt="{{ $about_section->title ?? '' }}" class="img-thumbnail mb-4">
                </div>
                <div class="pl-md-4 col-md-9">
                    <h6 class="title">{{ $about_section->title ?? '' }}</h6>
                    <p class="subtitle">{{ $about_section->sub_title }}</p>
                    <p>{!! $about_section->description ?? '' !!}</p>
                    <a href="{{ $about_section->button_url ?? '' }}" target="{{ $about_section->button_target ?? '' }}" class="btn btn-primary rounded mt-3">{{ $about_section->button_text ?? '' }}</a>
                </div>
            </div>
        </div>
    </section>
@endif

