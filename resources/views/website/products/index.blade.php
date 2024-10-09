@extends('website.master')

@section('title')
    Products
@endsection

@section('body')
    {{-- <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Shop Grid</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">Shop</a></li>
                        <li>Shop Grid</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}


    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="product-sidebar">

                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('product-category', ['id' => $category->id]) }}">
                                            {{ $category->name }} 
                                        </a>
                                        <span>({{ $category->products_count }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('product-category', ['id' => $category->id]) }}">
                                            {{ $category->name }} 
                                        </a>
                                        <span>({{ $category->products_count }})</span>

                                        <ul class="sub-category-list">
                                            @foreach ($category->subCategories as $subCategory)
                                                <li>
                                                    <a href="{{ route('product-sub-category', ['id' => $subCategory->id]) }}">
                                                        <i class="lni lni-chevron-right"></i> {{ $subCategory->name }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div> --}}

                        <div class="single-widget">
                            <h3>All Sub Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    @foreach ($category->subCategories as $subCategory)
                                        <li>
                                            <a href="{{ route('product-sub-category', ['id' => $subCategory->id]) }}">
                                                {{ $subCategory->name }} </a>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="single-widget condition">
                            <h3>Filter by Brand</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                                <label class="form-check-label" for="flexCheckDefault11">
                                    Apple (254)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
                                <label class="form-check-label" for="flexCheckDefault22">
                                    Bosh (39)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault33">
                                <label class="form-check-label" for="flexCheckDefault33">
                                    Canon Inc. (128)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault44">
                                <label class="form-check-label" for="flexCheckDefault44">
                                    Dell (310)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault55">
                                <label class="form-check-label" for="flexCheckDefault55">
                                    Hewlett-Packard (42)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault66">
                                <label class="form-check-label" for="flexCheckDefault66">
                                    Hitachi (217)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault77">
                                <label class="form-check-label" for="flexCheckDefault77">
                                    LG Electronics (310)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault88">
                                <label class="form-check-label" for="flexCheckDefault88">
                                    Panasonic (74)
                                </label>
                            </div>
                        </div> --}}

                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="product-sorting">
                                        <div class="sort-by">
                                            <label for="sorting">Sort-by:</label>
                                            <select class="form-control" id="sorting">
                                                <option>Popularity</option>
                                                <option>Low - High Price</option>
                                                <option>High - Low Price</option>
                                                <option>Average Rating</option>
                                                <option>A - Z Order</option>
                                                <option>Z - A Order</option>
                                            </select>
                                        </div>
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="single-product">
                                        <div class="product-image">
                                            <img src="{{ asset($product->image) }}" alt="#">
                                            <div class="button">
                                                <a href="product-details.html" class="btn"><i
                                                        class="lni lni-cart"></i> Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <span class="category">{{ $product->category->name }}</span>
                                            <h4 class="title">
                                                <a
                                                    href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h4>
                                            <ul class="review">
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star"></i></li>
                                                <li><span>4.0 Review(s)</span></li>
                                            </ul>
                                            <div class="price">
                                                <span>{{ $product->selling_price }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrap-pagination">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
