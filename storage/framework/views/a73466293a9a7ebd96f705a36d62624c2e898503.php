<?php $__env->startSection('content'); ?>
<div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-3">
                <h2 class="font-bold">TMA</h2>

                <p>
                    Welcome to project TMA
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                 
                 <?php if(Session::has('flash_message')): ?>

                 <div class="alert alert-success">
                 <?php echo e(Session::get('flash_message')); ?>

                </div>
                 <?php endif; ?>

                    <form class="m-t" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                           
                            <input type="text" class="form-control" name="name" id="name" placeholder="Username or Email" value="<?php echo e(old('name')); ?>" required>
                       

                                
                            </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                          

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                        </div>

                                <button type="submit" id="submit" class="btn btn-primary block full-width m-b">Login</button>

                                <a href="<?php echo e(url('/password/reset')); ?>">
                                    <small>Forgot Your Password?</small>
                                </a>

                                <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                                </p>
                               <a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/register')); ?>">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Copyright Upstridge©2017</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>