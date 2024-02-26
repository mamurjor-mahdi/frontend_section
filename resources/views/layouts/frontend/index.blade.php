<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Steller landing page.">
    <meta name="author" content="Devcrud">
    <title>Steller Landing page | Free Bootstrap 4.1 landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
	<link rel="stylesheet" href="{{ asset('/') }}assets/css/steller.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    @if($commontitle !=null)
            @php
                $commontitle=json_decode($commontitle->data)
            @endphp
    @endif
    <!-- Page navigation -->
    @include('layouts.frontend.page-section.header')
    <!-- End of page navibation -->

    <!-- hero section-->
    @include('layouts.frontend.page-section.hero')
    <!-- End of hero section-->

    <!-- About section -->
    @include('layouts.frontend.page-section.about')

    <!-- Service section -->
    @include('layouts.frontend.page-section.service')
    <!-- End of Sectoin -->

    <!-- Skills section -->
    @include('layouts.frontend.page-section.choose')
    
    <!-- End of Skills sections -->

    <!-- Portfolio section -->
    @include('layouts.frontend.page-section.portfolio')
    
    <!-- End of portfolio section -->

    <!-- Testmonial Section -->
    @include('layouts.frontend.page-section.testmonial')
    
    <!-- End of testmonial section -->

    <!-- Blog Section -->
    @include('layouts.frontend.page-section.blog')
    

    <!-- Hire me section -->
    @include('layouts.frontend.page-section.hire_me')
    
    <!-- End od Hire me section. -->

    <!-- Contact Section -->
    @include('layouts.frontend.page-section.contact')
    <!-- End of Contact Section -->

    <!-- Page Footer -->
    @include('layouts.frontend.page-section.footer')
    
    <!-- End of page footer -->

	<!-- core  -->
    <script src="{{ asset('/') }}assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="{{ asset('/') }}assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="{{ asset('/') }}assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <!-- steller js -->
    <script src="{{ asset('/') }}assets/js/steller.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        $(document).ready(function() {
        var counters = $(".count");
        var countersQuantity = counters.length;
        var counter = [];

        for (i = 0; i < countersQuantity; i++) {
        counter[i] = parseInt(counters[i].innerHTML);
        }

        var count = function(start, value, id) {
        var localStart = start;
        setInterval(function() {
            if (localStart < value) {
            localStart++;
            counters[id].innerHTML = localStart;
            }
        }, 40);
        }

        for (j = 0; j < countersQuantity; j++) {
        count(0, counter[j], j);
        }
        });

    </script>
    <script>
        // Initialize Lightbox2
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.progress .progress-bar').css("width",
                    function() {
                        return $(this).attr("aria-valuenow") + "%";
                    }
            )
        });
    </script>
    
</body>
</html>
