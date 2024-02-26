@if (!empty($choose_sections))
<section class="section">
    <div class="container text-center">
        <div class="mb-4 pb-2">
            <h6 class="subtitle">{{ $commontitle->whychoose_sub_title ?? '' }}</h6>
            <h6 class="section-title mb-4">{{ $commontitle->whychoose_title ?? '' }}</h6>
            <p>{!! $commontitle->whychoose_description ?? '' !!}</p>
        </div>
        <div class="row text-left">
            @foreach ($choose_sections as $choose_section)
                @php
                    $choose=json_decode($choose_section->data)
                @endphp
                <div class="col-sm-6">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-3">{{ $choose->title ?? '' }}</h6>
                        <span>{{ $choose->number ?? '' }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%;" aria-valuenow="{{ $choose->number ?? '' }}" aria-valuemin="0" aria-valuemax="100"><span>{{ $choose->number ?? '' }}%</span></div>
                    </div>
                </div>
            @endforeach
            
            
        </div>
    </div>
</section>
@endif
