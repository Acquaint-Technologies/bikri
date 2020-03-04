<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>smart shop</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/assets/images/icons/favicon.ico')}}">

    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{asset('public/assets/js/webfont.js')}}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{asset('public/assets/js/webfont.js')}}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('public/assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>




</head>
<body>
<div class="page-wrapper">
    <!-- header -->
    @include('public.include.header')
    <!-- End .header -->

    <!-- body -->
    @yield('body')
    <!-- End body -->

    <!-- footer -->
    @include('public.include.footer')
    <!-- End footer -->
</div><!-- End .page-wrapper -->




<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->


<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-retweet"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
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
                        <li><a href="#">Sales Report</a></li>
                    </ul>
                </li>
                <li class="sf-with-ul">
                    <a href="#">Subscription Fee</a>
                    <ul>
                        <li><a href="#">Subscription Payments</a></li>
                        <li><a href="#">Pending Subscription</a></li>
                    </ul>
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
            <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->




<!-- Add Cart Modal -->
<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body add-cart-box text-center">
                <p>You've just added this product to the<br>cart:</p>
                <h4 id="productTitle"></h4>
                <img src="" id="productImage" width="100" height="100" alt="adding cart image">
                <div class="btn-actions">
                    <a href="cart.html"><button class="btn-primary">Go to cart page</button></a>
                    <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<script src="{{asset('js/app.js')}}"></script>

<!-- Plugins JS File -->
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/js/plugins.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{asset('public/assets/js/main.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@stack('scripts')

</body>
</html>
