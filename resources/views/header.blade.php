{{--<!-- Header desktop -->  --}}
{{--{{ dd($menus)  }}--}}
@php
    $menu_web = \App\Helpers\Helper::menus($menus)  ;
    $menu_mb = \App\Helpers\Helper::menu_mb($menu_mb)  ;
@endphp

<div class="container-menu-desktop">
    <!-- Topbar -->
    {{--  --}}

    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="/" class="logo">
                <img src="/template/images/icons/tclothes.png" alt="IMG-LOGO">
            </a>

            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu"> <a href="">Home</a> </li>
                    {!!     $menu_web !!}

                    <li>
                        <a href="about.html">About</a>
                    </li>

                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
                @php $number_cart = 0 @endphp
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$number_cart}}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="/admin/" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
{{--                    <i class=" fa-solid fa-right-to-bracket"></i>--}}
                    <i class="zmdi zmdi-home"></i>
                </a>
            </div>
        </nav>
    </div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
        <a href="index.html"><img src="/template/images/icons/tclothes.png" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
            <i class="zmdi zmdi-shopping-cart"></i>
        </div>

        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 " >
            <i class="zmdi zmdi-home"></i>
        </a>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
    </div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">

    <ul class="main-menu-m">
        <li>
            <a href="index.html">Home</a>
            <ul class="sub-menu-m">
                <li><a href="index.html">Homepage 1</a></li>
                <li><a href="home-02.html">Homepage 2</a></li>
                <li><a href="home-03.html">Homepage 3</a></li>
            </ul><span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        </li>
        {!! $menu_mb !!}


        <li>
            <a href="about.html">About</a>
        </li>

        <li>
            <a href="contact.html">Contact</a>
        </li>
    </ul>
</div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-0-sm">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="tìm kiếm ...">
        </form>
    </div>
</div>
