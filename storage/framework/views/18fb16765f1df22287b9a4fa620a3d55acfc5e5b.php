<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row clearfix justify-content-center">
        <div class="col-md-12 col-md-12 col-lg-12">
            <div class="card" style="background: white; padding: 10px;">
                <div class="card-header">Dashboard</div>

                <div class="body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <!-- start of row clear fix-->
                     <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($employees); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL EMPLOYEES</div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-cyan hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($occupations); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL OCCUPATIONS</div>
                                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($medicals); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL MEDICALS</div>
                                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-orange hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($users); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL USERS</div>
                                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of row clearfix-->

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($employee_med); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL EMPLOYEES WITH MEDICALS</div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-cyan hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($occupation_med); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL OCCUPATIONS WITH MEDICALS</div>
                                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($roles); ?>

                                </div>
                                <div class="content">
                                    <div class="text">TOTAL ROLES</div>
                                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-orange hover-expand-effect">
                                <div class="icon">
                                    <hr style="background-color: white;">
                                    <?php echo e($due_meds); ?>

                                </div>
                                <div class="content">
                                    <div class="text">MEDICALS DUE THIS WEEK</div>
                                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>