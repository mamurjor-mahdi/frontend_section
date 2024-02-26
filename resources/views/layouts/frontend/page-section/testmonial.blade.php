@if (!empty($portfolio_sections))
<section id="testmonial" class="section">
    <div class="container text-center">
        <div class="mb-4 pb-2">
            <h6 class="subtitle">{{ $commontitle->testmonial_sub_title ?? '' }}</h6>
            <h6 class="section-title mb-4">{{ $commontitle->testmonial_title ?? '' }}</h6>
            <p>{!! $commontitle->testmonial_description ?? '' !!}</p>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($testmonial_sections as $index => $testmonial_section)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" @if($index == 0) class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($testmonial_sections as  $index =>$testmonial_section)
                    @php
                        $testmonial=json_decode($testmonial_section->data)
                    @endphp
                    <div class="carousel-item @if($index == 0) active @endif">
                        <div class="card testmonial-card border">
                            <div class="card-body">
                                <img src="{{ asset('backend/images/homepages/testmonial_image/'.$testmonial->image) }}" alt="{{ $testmonial->testmonial_name ?? '' }}">
                                <p>{!! $testmonial->description ?? '' !!}</p>
                                <h1 class="title">{{ $testmonial->testmonial_name ?? '' }}</h1>
                                <h1 class="subtitle">{{ $testmonial->designation ?? '' }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
@endif
