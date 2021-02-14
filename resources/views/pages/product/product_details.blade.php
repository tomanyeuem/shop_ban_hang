@extends('layout')

@section('main_content')
            <!--product-details-->
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset('public/backend/uploads/product/'.$product->product_image)}}" alt="" />
                            <h3>Phóng to</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                            <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <a href=""><img src="{{asset('public/frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                    <a href=""><img src="{{asset('public/frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>                                
                                </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <form method="POST" action="{{ route('save_cart') }}">
                            {{ @csrf_field() }}
                            <div class="product-information"><!--/product-information-->
                                <img src="{{asset('public/frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                <h2>{{$product->product_name}}</h2>
                                <p>Mã sản phẩm: 00{{ $product->product_id }}</p>
                                <img src="{{asset('public/frontend/images/product-details/rating.png')}}" alt="" />
                                <div>
                                    <div><h3>Giá: {{ number_format($product->product_price,0,",",".") }}</h3></div>
                                    <input name="product_id" value="{{ $product->product_id }}" type="hidden" />
                                    <div>
                                        <h3>Số lượng: <input style="width: 100px" min="1" type="number" name="product_quantity" value="1" /></h3>
                                    </div>
                                    <div><button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    </div>
                                </div>
                                <p><b>Tình trạng:</b>
                                    @if ($product->product_quantity >= 1)
                                    <span style="color: #288ad6; font-size: 20px; font-weight: bold; text-transform: capitalize">Còn hàng</span>
                                    @else 
                                        <span style="color: #288ad6; font-size: 20px; font-weight: bold; text-transform: capitalize">Hết hàng</span>
                                    @endif
                                </p>
                                <p><b>Thương Hiệu: </b>{{ $true_brand->brand_name }}</p>
                                <a href=""><img src="{{asset('public/frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </form>
                    </div>
                </div>
    <!--/product-details-->
    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active" ><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Thông tin công ty</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li><a href="#reviews" data-toggle="tab">Đánh giá / Rating</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                <div class="col-sm-12">
                        <div class="about_product text-justify">
                            <p>{!! $product->product_content  !!}</p>
                        </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-12">
                    <div class="about_product text-justify">
                        <p>{!! $true_brand->brand_desc !!}</p>
                    </div>
                </div>                              
            </div>
            
            <div class="tab-pane fade" id="tag" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/frontend/images/home/gallery1.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/frontend/images/home/gallery2.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/frontend/images/home/gallery3.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/frontend/images/home/gallery4.jpg')}}" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="{{asset('public/frontend/images/product-details/rating.png')}}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản Phẩm Liên Quan</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related_product as $items)
                        @if ($items->product_id != $product->product_id)
                        <a href="{{ route('product_details', ['product_id' => $items->product_id, 'brand_id' => $items->brand_id, 'cat_id' => $items->cat_id]) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <form action="{{ route('save_cart_direct') }}" method="POST">
                                            {{ @csrf_field() }}
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/backend/uploads/product/'.$items->product_image)}}" alt="" />
                                                <h2>{{ $items->product_name }}</h2>
                                                <input type="hidden" name="product_id" value="{{ $items->product_id }}">
                                                <p style="font-weight: bold; font-size: 20px">Giá: {{ number_format($items->product_price,0,",",".") }}</p>
                                                <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
    </div><!--/recommended_items-->
@endsection