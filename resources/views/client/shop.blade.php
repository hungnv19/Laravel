@extends('layout.main')
@section('content-title', 'Trang sản phẩm')
@section('content')
    <section class="shop spad">
        <section class="breadcrumb-option">
            <div class="container">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Shop</h4>
                            <div class="breadcrumb__links">
                                <a href="{{ asset('/') }}">Home</a>
                                <a href="{{ asset('/product') }}">Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{route('searchProduct')}}">
                                @csrf
                                <input type="text" width="400px" name="name" placeholder="Tìm kiếm"
                                    class="form-control">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                @foreach ($category as $category)
                                                    <li>
                                                        <a
                                                            href="{{ route('categoryProducts', $category->id) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    {{-- <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="xs">Nhỏ
                                                    <input type="radio" id="xs">
                                                </label>
                                                <label for="sm">Vừa
                                                    <input type="radio" id="sm">
                                                </label>
                                                <label for="md">Lớn
                                                    <input type="radio" id="md">
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img class="card-img" src="{{ asset($item->avatar) }}"
                                            style="width: 254px; height: 254px;" alt="" />
                                        <div class="p_icon">
                                            <a href=" {{ route('productDetail', $item->id) }}">

                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="#">
                                                <i class="ti-heart"></i>
                                            </a>
                                            <a href=" {{ route('cart.addCart', $item->id) }}">


                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="   {{ route('productDetail', $item->id) }}" class="d-block">

                                            <h4>{{ $item->name }}</h4>
                                        </a>
                                        <div class="mt-3" >
                                            <span class="mr-4" style=" color:red">{{ $item->promotion }} <sup>đ</sup></span>
                                            <del>{{ $item->price }} <sup>đ</sup></del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/noi-that/sp-1.jpg">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="img/icon/compare.png" alt="">
                                                <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>Piqué Biker Jacket</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$67.24</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <div>
                        {{ $product->links() }}
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
