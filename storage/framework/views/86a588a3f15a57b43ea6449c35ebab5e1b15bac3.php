<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>
                        <b><?php echo e(__('Login')); ?></b>
                    </h2>
                </div>

                <div class="body">
                    <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>" id="sign_in">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">

                            <div class="form-line">
                                <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                                <input id="email" type="email" placeholder="<?php echo e(__('E-Mail Address')); ?>" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" required autofocus/>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label for="email"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" placeholder="<?php echo e(__('Password')); ?>" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required/>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                             <button type="submit" class="btn btn-primary btn-block">
                            <?php echo e(__('Login')); ?>

                            </button>
                            <br>
                            <div class="align-center">
                                <a href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>