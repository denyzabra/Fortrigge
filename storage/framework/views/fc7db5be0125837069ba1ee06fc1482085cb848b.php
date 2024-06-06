    <!DOCTYPE html>
<html lang="en">
<?php
    $settings=settings();
?>

<head>
    <!-- Required meta tags-->
    

    


    
    

    
    

    <!-- shortcut icon-->
    
    

    <!-- shortcut icon-->
    
    <!-- Fonts css-->
    
    <!-- Font awesome -->
    
    <!-- animat css-->
    
    <!-- Bootstrap css-->
    <link href="<?php echo e(asset('assets/css/vendor/bootstrap.css')); ?>" rel="stylesheet">
    <!-- Custom css-->

    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    
</head>

<body>
<!-- header start-->
<header class="land-header fixed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-contain position-relative">
                    <div class="codex-brand">
                        
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="menu-block">
                            <ul class="menu-list">
                                <li class="d-xl-none">
                                    <a class="close-menu" href="javascript:void(0);">
                                        
                                    </a>
                                </li>
                                <li class="menu-item"><a href="https://fortrigge.com/"><?php echo e(__('Home')); ?></a></li>
                                

                                <li class="menu-item">
                                    <a class="btn btn-primary me-2" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?> </a>
                                    <?php if($settings['register_page']=='on'): ?>
                                        <a class="btn btn-primary" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?> </a>
                                    <?php endif; ?>

                                </li>

                            </ul>
                            <a class="menu-action d-xl-none" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end-->

<!-- intro start-->
<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-lg-7">
                <div class="intro-contain">
                    <div>
                        <h1 class="wow fadeInLeft" data-wow-duration="1s"><?php echo e(__('Fortrigge - Property Management System')); ?></h1>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- intro end-->
<!-- demo start-->

<!-- demo end-->
<!-- header otpion start-->

<!-- header otpion End-->
<!-- innderpages start-->

<!-- innderpages end-->


<!-- footer start-->
<footer class="lan-footer space-py-10">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="support-contain">
                    <div class="codex-brand">
                        
                    </div>
                </div>
            </div>
            <div class="col text-end">
                <div class="support-contain">
                    <div class="codex-brand">
                        <p class="mt-20"><?php echo e(__('Copyright')); ?> <?php echo e(date('Y')); ?> <?php echo e(env('APP_NAME')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end-->
<!-- tap to top start-->
<div class="scroll-top"><i class="fa fa-angle-double-up"></i></div>
<!-- tap to top end-->
<!-- main jquery-->
<script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
<!-- Feather iocns js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.js')); ?>"></script>
<!-- Wow js-->
<script src="<?php echo e(asset('assets/js/vendors/wow.min.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.js')); ?>"></script>
<script>
    //*** Header Js ***//
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    });

    //*** Menu Js ***//
    $(document).on("click", '.menu-action', function () {
        $('.menu-list').toggleClass('open');
    });
    $(document).on("click", '.close-menu', function () {
        $('.menu-list').removeClass('open');
    });

    //*** BACK TO TOP START ***//
    $(window).scroll(function () {
        if ($(window).scrollTop() > 450) {
            $('.scroll-top').addClass('show');
        } else {
            $('.scroll-top').removeClass('show');
        }
    });
    $(document).ready(function () {
        $(document).on("click", '.scroll-top', function () {
            $('html, body').animate({scrollTop: 0}, '450');
        });
    });

    //*** WOW Js ***//
    new WOW().init();
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Fortrigge\resources\views/layouts/landing.blade.php ENDPATH**/ ?>