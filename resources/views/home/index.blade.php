@extends('layouts.app')
@section('content')
    <!-- start home slider -->
    @include('components.slide')
    <!-- end home slider -->
    <!-- San pham noi bat -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sách nổi bật</h2>
            </div>
            <!-- our-product area start -->
            @if(isset($bookHot))
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="features-curosel">

                            @foreach($bookHot as $hot)
                                <!-- single-product start -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product first-sale">

                                            <div class="product-img">
                                                @if($hot->book_number==0)
                                                    <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px;">Tạm hết</span>
                                                @endif

                                                <a href="{{route('get.detail.book',[$hot->book_slug,$hot->id])}}">
                                                    <img class="primary-image" src="{{pare_url_file($hot->book_avatar)}}" alt="" style="width: 243px;height: 252px"/>
                                                    <img class="secondary-image" src="{{pare_url_file($hot->book_avatar)}}" alt="" style="width: 243px;height: 252px"/>
                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="{{route('get.detail.book',[$hot->book_slug,$hot->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="" title="Add to Cart"><i class="icon-bag"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="quickviewbtn">
                                                            <a href="{{route('get.detail.book',[$hot->book_slug,$hot->id])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">{{$hot->book_name}}</a></h2>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- single-product end -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
    <!-- latestpost area start -->


    <!-- testimonial area start -->
    <div class="testimonial-area lap-ruffel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="crusial-carousel">
                        <div class="crusial-content">
                            <p>“Cuộc sống không phải là một vấn đề cần giải quyết, mà là thực tế để chúng ta cần trải nghiệm”</p>
                            <span>MR X</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Khi bạn thay thế những suy nghĩ tiêu cực bằng suy nghĩ tích cực, bạn sẽ nhận được những kết quả tích cực”</p>
                            <span>MR Y</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Luôn luôn mơ và nhắm cao hơn khả năng của bản thân. Đừng bận tâm tới việc làm tốt hơn những người đương thời hay những người đi trước. Hãy cố để làm tốt hơn chính mình.”</p>
                            <span>MR Z</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
@stop

