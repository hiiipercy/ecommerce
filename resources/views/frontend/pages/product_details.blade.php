@extends('frontend.layouts.master')
@push('style')
    <style>
        .font_size{
            font-size: 30px !important;
            color: #71cd14;
        }
        .text-red{
            color: red;
        }
    </style>
@endpush
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Product Details</h2>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="single-product.html">Product Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                <img src="{{ asset('/') }}assets/img/product/single-product/s-product-s-2.jpg" alt="" />
                            </li> --}}
                            <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                <img src="{{ asset('/') }}assets/img/product/single-product/s-product-s-3.jpg" alt="" />
                            </li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                <img src="{{ asset('/') }}assets/img/product/single-product/s-product-s-4.jpg" alt="" />
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            {{-- <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="{{ asset('/') }}assets/img/product/single-product/s-product-1.jpg"
                                    alt="First slide" />
                            </div> --}}
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="{{ asset('/') }}assets/img/product/single-product/s-product-s-2.jpg"
                                    alt="Second slide" />
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="{{ asset('/') }}assets/img/product/single-product/s-product-s-3.jpg"
                                    alt="Third slide" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 product_data">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>$149.99</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Category</span> :
                                {{ $product->category_id ? $product->category->name : 'N/A' }}</a>
                        </li>
                        <li>
                            {{-- <a href="#"> <span>Availibility</span> : {{ $product->available }}</a> --}}
                            <a href="#"> <span>Availibility</span> : {{ STOCK[$product->available] ?? 'N/A' }}</a>
                        </li>
                    </ul>
                    <p>
                        {{ $product->description }}
                    </p>
                    <div class="product_count">
                        <input type="hidden" name="update_id" id="update_id">
                        <input type="hidden" class="product_id" value="{{ $product->id }}">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" class="input-text qty" />
                        <button
                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                            class="increase items-count" type="button">
                            <i class="lnr lnr-chevron-up"></i>
                        </button>
                        <button
                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                            class="reduced items-count" type="button">
                            <i class="lnr lnr-chevron-down"></i>
                        </button>
                    </div>
                    <div class="card_area">
                        <button type="button" class="main_btn" id="addToCart">Add to
                            Cart</button>
                        <a class="icon_btn" href="#">
                            <i class="lnr lnr lnr-diamond"></i>
                        </a>
                        <a class="icon_btn" href="#">
                            <i class="lnr lnr lnr-heart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    {{ $product->description }}
                </p>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/single-product/review-1.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/single-product/review-2.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/single-product/review-3.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                                novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Full name" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email Address" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number"
                                            placeholder="Phone Number" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1"
                                            placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn submit_btn">
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--================Start Review section=================-->

            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    @php
                    $fiveStarReviewsCount   = $reviews->where('star', 5)->count();
                    $fourStarReviewsCount   = $reviews->where('star', 4)->count();
                    $threeStarReviewsCount  = $reviews->where('star', 3)->count();
                    $twoStarReviewsCount    = $reviews->where('star', 2)->count();
                    $oneStarReviewsCount    = $reviews->where('star', 1)->count();

                    // Overall calculation
                    $fivestar = (5/5)*($fiveStarReviewsCount*5);
                    $fourstar = (4/5)*($fourStarReviewsCount*5);
                    $threestar = (3/5)*($threeStarReviewsCount*5);
                    $twostar = (2/5)*($twoStarReviewsCount*5);
                    $onestar = (1/5)*($oneStarReviewsCount*5);

                    $total = $fivestar+$fourstar+$threestar+$twostar+$onestar;
                    $totalReviewCount= $reviews->count();
                    $overAllRatting = $totalReviewCount > 0 ? round($total / $totalReviewCount) : 0;
                @endphp
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Overall</h5>
                                    @if ($overAllRatting == 0)
                                        <h4 class="font_size">Reviews(0)</h4>
                                    @else
                                        <h4>{{ $overAllRatting }}.0</h4>
                                        <h6>({{ $reviews->count() }} Reviews)</h6>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Based on {{ $reviews->count() }} Reviews</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="#">5 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> {{ $fiveStarReviewsCount}}</a>
                                        </li>
                                        <li>
                                            <a href="#">4 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> {{ $fourStarReviewsCount }}</a>
                                        </li>
                                        <li>
                                            <a href="#">3 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> {{ $threeStarReviewsCount }}</a>
                                        </li>
                                        <li>
                                            <a href="#">2 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> {{ $twoStarReviewsCount }}</a>
                                        </li>
                                        <li>
                                            <a href="#">1 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> {{ $oneStarReviewsCount }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            <div class="review_item">
                                @foreach ($reviews as $review)
                                    

                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{ asset('/') }}assets/img/product/single-product/review-1.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ $review->user->name }}</h4>
                                        @for ($i=1; $i <= $review->star; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p>
                                    {{ $review->description }}
                                </p> 
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <h4>Add a Review</h4>        
                            @php
                            $hasReviewed = \App\Models\Review::where('user_id', Auth::id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                            @endphp

                            @if ($hasReviewed)
                                <div id="error-message" class="message text-red"></div>
                            @else
                            <div id="success-message" class="message"></div>
                            @endif

                        
                            <input type="hidden" class="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="status">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="card">
                                        <br />
                                        <span onclick="setRating(1)" onmouseover="hoverRating(1)" onmouseout="resetRating()" class="star">★</span>
                                        <span onclick="setRating(2)" onmouseover="hoverRating(2)" onmouseout="resetRating()" class="star">★</span>
                                        <span onclick="setRating(3)" onmouseover="hoverRating(3)" onmouseout="resetRating()" class="star">★</span>
                                        <span onclick="setRating(4)" onmouseover="hoverRating(4)" onmouseout="resetRating()" class="star">★</span>
                                        <span onclick="setRating(5)" onmouseover="hoverRating(5)" onmouseout="resetRating()" class="star">★</span>
           
                                    </div>
                                     <input type="hidden" id="star" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control description" name="description" id="Review" rows="4"
                                        placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="button" class="main_btn" id="save-btn">Submit Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

@endsection

@push('scripts')
<script>
<!--================add to cart=================-->
    $(document).on('click', 'button#addToCart', function () {
        var product_id = $('.product_id').val();
        var product_qty = $('.qty').val();
        $.ajax({
            type: "POST",
            url: "{{ route('app.cart.update-or-store') }}",
            data: {
                _token: '{{ csrf_token() }}',
                'product_id': product_id,
                'product_qty': product_qty,
            },
            dataType: "json",
            success: function (response) {

            }
        });
    });

    let currentRating = 0;

    function setRating(rating) {
        currentRating = rating;
        document.getElementById('star').value = rating;
        updateStars();
    }

    function hoverRating(rating) {
        updateStars(rating);
    }

    function resetRating() {
        updateStars(currentRating);
    }

    function updateStars(rating = currentRating) {
        const stars = document.querySelectorAll('.star');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    updateStars();

    <!--================Add review=================-->
    $(document).on('click', 'button#save-btn', function () {
        var product_id = $('.product_id').val();
        var selectedRating = $('#star').val();
        var description = $('.description').val();
        $.ajax({
            type: "POST",
            url: "{{ route('app.review.update-or-store') }}",
            data: {
                _token: '{{ csrf_token() }}',
                'product_id': product_id,
                'star': selectedRating,
                'description': description,
            },
            dataType: "json",
            success: function (response) {
                //reload page after 5 second
                setTimeout(function () {
                    window.location.reload();
                }, 5000);
                if (response.success) {
                    // If the operation was successful
                    $('#success-message').text('Thank you for your feedback!').show().fadeOut(5000);
                } else {
                    // If there was an error or the operation was not successful
                    $('#error-message').text('You have already reviewed this product.').show().fadeOut(5000);
                }
            }
        });
    });

</script>
@endpush