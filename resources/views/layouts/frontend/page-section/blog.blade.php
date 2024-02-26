@if (!empty($blog_sections))
<section id="blog" class="section">
    <div class="container text-center">
        <div class="mb-4 pb-2">
            <h6 class="subtitle">{{ $commontitle->blogs_sub_title ?? '' }}</h6>
            <h6 class="section-title mb-4">{{ $commontitle->blogs_title ?? '' }}</h6>
            <p>{!! $commontitle->blogs_description ?? '' !!}</p>
        </div>
        <div class="row text-left">
            @foreach ($blog_sections as $blog_section)
                @php
                    $blog=json_decode($blog_section->data);
                @endphp
                <div class="col-md-4">
                    <div class="card border mb-4">
                        <img src="{{ asset('backend/images/homepages/blog_image/'.$blog->image) }}" alt="{{ $blog->title ?? '' }}" class="card-img-top w-100">
                        <div class="card-body">
                            <div class="justify-content-between d-flex">
                                <h5 class="card-title">{{ $blog->title ?? '' }}</h5>
                                <span>{{ $blog->category->category_name ?? '' }}</span>
                            </div>
                            <div class="post-details">
                                <a href="javascript:void(0)">Posted By: Admin</a>
                                <a href="javascript:void(0)"><i class="ti-thumb-up"></i> 456</a>
                                <a href="javascript:void(0)"><i class="ti-comment"></i> 123</a>
                            </div>
                            <p>{!! $blog->description ?? '' !!}</p>
                            <a href="{{ $blog->button_url ?? '' }}" target="{{ $blog->button_target ?? '' }}">{{ $blog->button_text ?? '' }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            
            {{-- <div class="col-md-4">
                <div class="card border mb-4">
                    <img src="{{ asset('/') }}assets/imgs/blog-2.jpg" alt="" class="card-img-top w-100">
                    <div class="card-body">
                        <h5 class="card-title">Web Layouts</h5>
                        <div class="post-details">
                            <a href="javascript:void(0)">Posted By: Admin</a>
                            <a href="javascript:void(0)"><i class="ti-thumb-up"></i> 456</a>
                            <a href="javascript:void(0)"><i class="ti-comment"></i> 123</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut ad vel dolorum, iusto velit, minima? Voluptas nemo harum impedit nisi.</p>
                        <a href="javascript:void(0)">Read More..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border mb-4">
                    <img src="{{ asset('/') }}assets/imgs/blog-3.jpg" alt="" class="card-img-top w-100">
                    <div class="card-body">
                        <h5 class="card-title">Bootstrap Framework</h5>
                        <div class="post-details">
                            <a href="javascript:void(0)">Posted By: Admin</a>
                            <a href="javascript:void(0)"><i class="ti-thumb-up"></i> 456</a>
                            <a href="javascript:void(0)"><i class="ti-comment"></i> 123</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut ad vel dolorum, iusto velit, minima? Voluptas nemo harum impedit nisi.</p>
                        <a href="javascript:void(0)">Read More..</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endif
