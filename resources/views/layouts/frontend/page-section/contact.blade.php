@if (!empty($mapaddress_sections))
@php
   $mapaddress=json_decode($mapaddress_sections->data)
@endphp
<section id="contact" class="position-relative section">
    <div class="container text-center">
        <div class="mb-4 pb-2">
            <h6 class="subtitle">{{ $commontitle->contact_sub_title ?? '' }}</h6>
            <h6 class="section-title mb-4">{{ $commontitle->contact_title ?? '' }}</h6>
            <p>{!! $commontitle->contact_description ?? '' !!}</p>
        </div>
        <div class="contact text-left">
            <div class="form">
                <h6 class="subtitle">{{ $mapaddress->subtitle ?? '' }}</h6>
                <h6 class="section-title mb-4">{{ $mapaddress->title ?? '' }}</h6>
                <form action="{{ route('app.contact.Created') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="your_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <textarea name="contact-message" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded w-lg">Send Message</button>
                </form>
            </div>
            <div class="contact-infos">
                <div class="item">
                    <i class="ti-location-pin"></i>
                    <div class="">
                        <h5>{{ $mapaddress->location_title }}</h5>
                        <p> {{ $mapaddress->address ?? '' }}</p>
                    </div>
                </div>
                <div class="item">
                    <i class="ti-mobile"></i>
                    <div>
                        <h5>{{ $mapaddress->number_title ?? '' }}</h5>
                        <p>{{ $mapaddress->number ?? '' }}</p>
                    </div>
                </div>
                <div class="item">
                    <i class="ti-email"></i>
                    <div class="mb-0">
                        <h5>{{ $mapaddress->email_title ?? '' }}</h5>
                        <p>{{ $mapaddress->email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map">
        <iframe src="{{ $mapaddress->map_url ?? '' }}"></iframe>
    </div>
</section>
@endif
