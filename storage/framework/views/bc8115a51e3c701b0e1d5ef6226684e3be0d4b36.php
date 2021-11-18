<?php $__env->startSection('content'); ?>

<div class="px-5 py-5 p-lg-0 bg-surface-secondary">
    <div class="d-flex justify-content-center">
        <div class="col-lg-5 col-xl-4 p-12 p-xl-20 position-fixed start-0 top-0 h-screen overflow-y-hidden bg-primary d-none d-lg-flex flex-column">
            <!-- Logo -->
            <a class="d-block" href="#">
                <img src="https://preview.webpixels.io/web/img/logos/clever-light.svg" class="h-10" alt="...">
            </a>
            <!-- Title -->
            <div class="mt-32 mb-20">
                <h1 class="ls-tight font-bolder display-6 text-white mb-5">
                    PlayersGathering
                </h1>
                <p class="text-white-80">
                    Maybe some text here will help me see it better. Oh God. Oke, let’s do it then.
                </p>
            </div>
            <!-- Circle -->
            <div class="w-56 h-56 bg-orange-500 rounded-circle position-absolute bottom-0 end-20 transform translate-y-1/3"></div>
        </div>
        <div class="col-12 col-md-9 col-lg-7 offset-lg-5 border-left-lg min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">

            <div class="col-lg-10 col-md-9 col-xl-6 mx-auto ms-xl-0">
            <div class="mt-10 mt-lg-5 mb-6 d-flex align-items-center d-lg-block">
                <span class="d-inline-block d-lg-block h1 mb-lg-6 me-3">👋</span>
                <h1 class="ls-tight font-bolder h2">
                    <?php echo e(__('Nice to see you!')); ?>

                </h1>
            </div>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-5">
                    <label class="form-label" for="email"><?php echo e(__('E-Mail Address')); ?></label>
                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <label class="form-label" for="password"><?php echo e(__('Password')); ?></label>
                        </div>
                        <div class="mb-2">
                            <?php if(Route::has('password.request')): ?>
                            <a href="<?php echo e(route('password.request')); ?>" class="small text-muted">Forgot password?</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-full">
                        <?php echo e(__('Sign in')); ?>

                    </button>
                </div>
            </form>
            <div class="my-6">
                <small><?php echo e(__('Don\'t have an account')); ?></small>
                <a href="<?php echo e(route('register')); ?>" class="text-warning text-sm font-semibold"><?php echo e(__('Sign up')); ?></a>
            </div>

        </div>


        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playersg/resources/views/auth/login.blade.php ENDPATH**/ ?>