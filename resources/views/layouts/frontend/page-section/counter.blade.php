<!-- Header-widget -->
@php
    $counter=json_decode($counter_section->data);
@endphp
<div class="widget">
    @foreach ($counter as $value)
    <div class="widget-item">
        <h2 class="count">124</h2>
        <p>Happy Clients</p>
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