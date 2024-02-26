@if (!empty($hireme_sections))
@php
    $hireme=json_decode($hireme_sections->data)
@endphp
<section class="bg-gray p-0 section">
    <div class="container">
        <div class="card bg-primary">
            <div class="card-body text-light">
                <div class="row align-items-center">
                    <div class="col-sm-9 text-center text-sm-left">
                        <h5 class="mt-3">{{ $hireme->title ?? '' }}</h5>
                        <p class="mb-3">{!! $hireme->description ?? '' !!}</p>
                    </div>
                    <div class="col-sm-3 text-center text-sm-right">
                        <a href="{{ $hireme->button_url ?? '' }}" target="{{ $hireme->button_target ?? '' }}" class="btn btn-light rounded">{{ $hireme->button_text ?? '' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

