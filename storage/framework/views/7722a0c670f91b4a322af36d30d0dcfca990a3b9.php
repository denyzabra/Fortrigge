
<!-- footer start-->
<footer class="codex-footer">
    <p><?php echo e(__('Copyright')); ?> <?php echo e(date('Y')); ?> © <?php echo e(env('APP_NAME')); ?> <?php echo e(__('All rights reserved')); ?>.</p>
</footer>
<!-- footer end-->
<!-- back to top start //-->
<div class="scroll-top"><i class="fa fa-angle-double-up"></i></div>
<!-- back to top end //-->
<!-- main jquery-->
<script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
<!-- Theme Customizer-->
<script src="<?php echo e(asset('assets/js/layout-storage.js')); ?>"></script>



<script src="<?php echo e(asset('assets/js/customizer.js')); ?>"></script>
<!-- Feather icons js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.js')); ?>"></script>
<!-- Scrollbar-->
<script src="<?php echo e(asset('assets/js/vendors/simplebar.js')); ?>"></script>
<!-- apex chart-->
<script src="<?php echo e(asset('assets/js/vendors/chart/apexcharts.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/vendors/select2/select2.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/vendors/sweetalert/sweetalert2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/sweetalert/custom-sweetalert2.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/vendors/slider/slick-sldier/slick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/slider/slick-sldier/slick-custom.js')); ?>"></script>
<!-- Datatable-->
<script src="<?php echo e(asset('assets/js/vendors/datatable/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/dataTables.buttons.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/buttons.print.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/jszip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/pdfmake.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendors/datatable/buttons.html5.js')); ?>"></script>

<!-- Custom script-->

<script src="<?php echo e(asset('assets/js/vendors/notify/bootstrap-notify.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/custom-script.js')); ?>"></script>
<?php echo $__env->yieldPushContent('script-page'); ?>

<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php if($message = Session::get('success')): ?>
    <script>
        toastrs('Success', '<?php echo $message; ?>', 'success')
    </script>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <script>toastrs('Error', '<?php echo $message; ?>', 'error')</script>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
    <script>toastrs('Info', '<?php echo $message; ?>', 'info')</script>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\Fortrigge\resources\views/admin/footer.blade.php ENDPATH**/ ?>