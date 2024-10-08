<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

{{-- <div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div> --}}


<header class="header navbar-area">

    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-3 col-7">

                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('/website') }}/assets/images/logo/logo.png" alt="Logo">
                    </a>

                </div>
                {{-- <div class="col-lg-4 col-md-7 d-xs-none">
                    <div class="main-menu-search">
                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>All</option>
                                        <option value="1">option 01</option>
                                        <option value="2">option 02</option>
                                        <option value="3">option 03</option>
                                        <option value="4">option 04</option>
                                        <option value="5">option 05</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-7 col-md-9 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Hotline:
                                <span>(+100) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ count(ShoppingCart::all()) }}</span>
                                </a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ count(ShoppingCart::all()) }} Items</span>
                                        <a href="{{ route('show-cart') }}">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @php($sum = 0)
                                        @foreach (ShoppingCart::all() as $item)
                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                            src="{{ asset($item->image) }}"
                                                            alt="{{ $item->name }}"></a>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="product-details.html">
                                                            {{ $item->name }}</a></h4>
                                                    <p class="quantity">{{ $item->qty }}x - <span
                                                            class="amount">{{ $item->price }}</span></p>
                                                </div>
                                            </li>
                                            @php($sum += $item->price * $item->qty)
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">{{ $sum }}</span>
                                        </div>
                                        <div class="button">
                                            <a href="{{ route('checkout') }}" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-6 col-12">
                <div class="nav-inner">

                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('product-category', ['id' => $category->id]) }}">{{ $category->name }}
                                        @if (count($category->subCategories) > 0)
                                            <i class="lni lni-chevron-right"></i>
                                        @endif
                                    </a>
                                    <ul class="{{ count($category->subCategories) > 0 ? 'inner-sub-category' : '' }}">
                                        @foreach ($category->subCategories as $subCategory)
                                            <li><a href="product-grids.html">{{ $subCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="index.html" class="active">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a>About</a>
                                </li>
                                <li class="nav-item">
                                    <a>Shop</a>
                                </li>
                                
                                {{-- <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                    <ul class="sub-menu collapse" id="submenu-1-4">
                                        <li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid
                                                Sidebar</a>
                                        </li>
                                        <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                        <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
                                                Sibebar</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                </li>
                                @if (Session::get('customer_id'))
                                    <div class="user">
                                        <i class="lni lni-user"></i>
                                        Hello {{ Session::get('customer_name') }}
                                    </div>
                                    <li class="nav-item">
                                        <a href="{{ route('customer.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('customer.logout') }}">Logout</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('customer.login') }}">Sign In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('customer.register') }}">Register</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">

                <div class="nav-social">
                    {{-- <h5 class="title">Follow Us:</h5> --}}
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</header>
