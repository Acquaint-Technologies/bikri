<header class="header">
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">

                <?php if(session()->has('ownerId')) { ?>

                <button class="mobile-menu-toggler" type="button">
                    <i class="icon-menu"></i>
                </button>
            <?php } else { ?>

                    <button class="mobile-menu-toggler" type="button" disabled="">
                        <i class="icon-menu" hidden disabled=""></i>
                    </button>
<!--                 --><?php //return redirect('/') ?>
                <?php }?>

                <a href="home.php" class="logo" style="display:none;">
                    <img src="{{asset('public/assets/images/logo.png')}}" alt="Porto Logo">
                </a>
                <h1>BIKRI</h1>

                <nav class="main-nav">
                    <ul class="menu">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li class="sf-with-ul">
                            <a href="#">Product List</a>
                            <ul>
                                <li><a href="{{route('add-product')}}">Add Product</a></li>
                                <li><a href="{{route('view-product')}}">Product List</a></li>
                            </ul>
                        </li>
                        <li class="sf-with-ul">
                            <a href="#">Sales List</a>
                            <ul>
                                <li><a href="{{route('add-sale')}}">Add Sales</a></li>
                                <li><a href="{{route('view-sale')}}">Sales List</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div><!-- End .header-left -->

            <div class="header-right">





                <div class="header-search">
{{--                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>--}}
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="I'm searching for..." required="">
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    <option value="34">- Boats</option>
                                    <option value="57">- Auto Tools &amp; Supplies</option>
                                </select>
                            </div><!-- End .select-custom -->
                            <button class="btn" type="submit"><i class="icon-search-3"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div>

{{--                <a href="#" class="porto-icon"><i class="icon icon-wishlist-2"></i></a>--}}

                <div class="header-user">

                    <?php if(session()->has('ownerId')) { ?>
                    <a href=""><strong><h2 class=" icon-user-2 icon-3x"></h2></strong></a>
                    <a href="{{route('lets change')}}"><h3 class="text-right">{{Session::get('ownerName')}}</h3></a>
{{--                    <div class="dropdown">--}}
{{--                        <button  class="btn btn-sm dropdown-toggle btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        </button>--}}

{{--                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">--}}
                        <a  href="{{route('owner-logout')}}"><p>&nbsp; (Logout)</p></a>
{{--                        </div>--}}
                        <?php } else { ?>
                        <a href=""><strong><h2 class=" icon-user-2 icon-3x"></h2></strong></a>
                        <a href="{{route('/')}}">(Please Login First)</a>
                        <?php }?>
                    </div>
                    <hr>


                </div>

            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->
</header>
