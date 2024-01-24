<!-- Responsive Breadcrumb Start-->
<nav aria-label="breadcrumb">
    @isset($breadcrumb)
        <ol class="breadcrumb">
            @foreach ($breadcrumb as $key => $value)
            <li class="breadcrumb-item {{ $loop->last ? '' : 'active' }}">
        
                @if ($loop->last)
                {{ $key }}
                @else
                <a href="{{ $value }}">{{ $key }}</a>
                @endif
            </li>
            @endforeach
        </ol>
    @endisset
</nav>
<!-- Responsive Breadcrumb End-->