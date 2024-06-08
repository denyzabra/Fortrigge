<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Account Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Account Settings')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3 cdx-xxl-30 cdx-xl-40">
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <div class="card user-card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="user-imgwrap">
                                <img class="img-fluid rounded-50" src="<?php echo e((!empty($loginUser->profile)? asset(Storage::url('upload/profile/')).'/'.$loginUser->profile : asset(Storage::url('upload/profile')).'/avatar.png')); ?>" alt="4.jpg">
                            </div>
                            <div class="user-detailwrap">
                                <h3><?php echo e($loginUser->name); ?></h3>
                                <h6><?php echo e(ucfirst($loginUser->type)); ?></h6>
                                <h6 class="mt-5"><?php echo e($loginUser->email); ?></h6>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-9 cdx-xxl-70 cdx-xl-60">
            <div class="card">
                <div class="card-body">
                    <div class="info-group">
                        <?php echo e(Form::model($loginUser, array('route' => array('setting.account'), 'method' => 'post', 'enctype' => "multipart/form-data"))); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('first_name',__('First Name'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::text('first_name',null,array('class'=>'form-control','placeholder'=>__('Enter your first name'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('last_name',__('Last Name'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::text('last_name',null,array('class'=>'form-control','placeholder'=>__('Enter your last name'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('email',__('Email Address'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter your email'),'required'=>'required'))); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('profile',__('Profile'),array('class'=>'form-label'))); ?>

                                    <?php echo e(Form::file('profile',array('class'=>'form-control'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary btn-rounded'))); ?>

                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Fortrigge\resources\views/settings/account.blade.php ENDPATH**/ ?>