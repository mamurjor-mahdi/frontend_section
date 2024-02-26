@if (!empty($service_sections))
<section id="service" class="section">
    <div class="container text-center">
        <div class="mb-4 pb-2">
            <h6 class="subtitle">{{ $commontitle->service_sub_title ?? '' }}</h6>
            <h6 class="section-title mb-4">{{ $commontitle->service_title ?? '' }}</h6>
            <p>{!! $commontitle->service_description ?? '' !!}</p>
        </div>
        <div class="row">
            @foreach ($service_sections as $service_section)
            @php
                $data=json_decode($service_section->data)
            @endphp
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="custom-card card border">
                    <div class="card-body">
                        {!! $data->service_icon ?? '' !!}
                        <h5>{{ $data->title ?? '' }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
