<section id="shop" class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>Products</span></h2>
                    <p>Bring called seed first of third give itself now ment</p>
                </div>
            </div>
        </div>

        <div class="row">
            
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <div class="product-img">
                        <img class="img-fluid w-100" src="{{ asset('uploads/'.PRODUCT_AVATAR_PATH.$product->image) }}"
                            alt="" />
                        <div class="p_icon">
                            <a href="{{ route('product_details', $product->id) }}">
                                <i class="ti-eye"></i>
                            </a>
                            <a href="#">
                                <i class="ti-heart"></i>
                            </a>
                            <a href="#">
                                <i class="ti-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-btm">
                        <a href="#" class="d-block">
                            <h4>{{ $product->name }}</h4>
                        </a>
                        <div class="mt-3">
                            <span class="mr-4">${{ $product->price }}</span>
                            @if(!empty($product->pre_price))
                            <del>${{ $product->pre_price }}</del>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</section>