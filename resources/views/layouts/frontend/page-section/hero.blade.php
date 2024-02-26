@if(!empty($hero_sections))
@php
    $hero_section=json_decode($hero_sections->data);
    $social_share=json_decode($hero_section->social_share);
@endphp 
<section class="header" id="home">
    <div class="container">
        <div class="infos">
            <h6 class="subtitle">{{ $hero_section->hello_text ?? '' }}</h6>
            <h6 class="title">{{ $hero_section->title ?? '' }}</h6>
            <p>{{ $hero_section->designation ?? '' }}</p>

            <div class="buttons pt-3">
                <a href="{{ $hero_section->hire_button_url ?? '' }}" target="{{ $hero_section->hire_button_target ?? '' }}" class="btn btn-primary rounded">{{ $hero_section->hire_button_text ?? '' }}</a>
                <a  href="{{ $hero_section->cv_button_url ?? '' }}" target="{{ $hero_section->cv_button_target ?? '' }}" class="btn btn-dark rounded">{{ $hero_section->cv_button_text ?? '' }}</a>
            </div>

            <div class="socials mt-4">
                @foreach ($social_share as $value)
                <a class="social-item" href="{{ $value->socail_url ?? '' }}" target="{{ $value->socail_target }}">{!! $value->social_icon ?? '' !!}</a>
                @endforeach
            </div>
        </div>
        <div class="img-holder">
            <img src="{{ asset('backend/images/homepages/hero_image/'.$hero_section->image ) }}" alt="">
        </div>
    </div>
    
    <!-- Header-widget -->
    
    <div class="widget">
        @foreach ($counter_sections as $value)
            @php
                $counter=json_decode($value->data);
            @endphp
            <div class="widget-item">
                <h2 class="count">{{ $counter->number ?? '' }}</h2>
                <p>{{ $counter->title ?? '' }}</p>
            </div>
        @endforeach
    </div>
    
    {{-- <div class="widget">
        <div class="widget-item">
            <h2 class="count">124</h2>
            <p>Happy Clients</p>
        </div>
        <div class="widget-item">
            <h2 class="count">456</h2>
            <p>Project Completed</p>
        </div>
        <div class="widget-item">
            <h2 class="count">789</h2>
            <p>Awards Won</p>
        </div>
    </div> --}}
</section>
@endif