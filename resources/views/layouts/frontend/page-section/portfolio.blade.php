@if (!empty($portfolio_sections))

<section id="portfolio" class="section">
    <div class="container text-center">
        <div class="mb-4 pb-2">
            <h6 class="subtitle">{{ $commontitle->portfolio_sub_title ?? '' }}</h6>
            <h6 class="section-title mb-4">{{ $commontitle->portfolio_title ?? '' }}</h6>
            <p>{!! $commontitle->portfolio_description ?? '' !!}</p>
        </div>
        <div class="row">
            @foreach ($portfolio_sections as $portfolio_section)
                @php
                    $portifolio=json_decode($portfolio_section->data)
                @endphp
            <div class="col-sm-4">
                    <div class="img-wrapper">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('backend/images/homepages/portfolio_image/'.$portifolio->image) }}" alt="">
                        </a>
                        <div class="overlay">
                            <div class="overlay-infos">
                                <h5>{{ $portifolio->title ?? '' }}</h5>
                                <a href="{{ asset('backend/images/homepages/portfolio_image/'.$portifolio->image) }}" data-lightbox="projects"><i class="ti-zoom-in"></i></a>
                                <a href="{{ $portifolio->site_url ?? '' }}"><i class="ti-link"></i></a>
                            </div>
                         </div>
                    </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
    
@endif
