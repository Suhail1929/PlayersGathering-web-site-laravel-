<?php $__env->startSection('title'); ?> Modifier un utilisateur <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(url('users',  $users->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3 row" >
            <label for="name" class="col-sm-2 col-form-label ">Nom de l'utilisateur</label>
            <div class="d-flex">
            <input type="text" class="form-control" name="name" id="name"
                       placeholder="Saisir le nouveau nom" value="<?php echo e($users->name); ?>"/>
            
            </div>
        </div>
        <div class="mb-3 row" >
            <label for="email" class="col-sm-2 col-form-label ">Email de l'utilisateur</label>
            <div class="d-flex">
            <input type="email" class="form-control" name="email" id="email"
                       placeholder="Saisir le nouveau email" value="<?php echo e($users->email); ?>"/>
            </div>
        </div>
        <div class="mb-3 row" >
            <label for="id_role" class="col-sm-2 col-form-label ">Role</label>
                            <div class="d-flex">
                            <select name="id_role" value="<?php echo e(old('id_role')); ?>">
                            <?php if(Auth::user()->id_role==1): ?>
                            <option value="1">Admin</option>
                            <?php endif; ?>
                            <option value="2">Modérateur</option>
                            <option value="3" selected>Utilisateur</option>
                            
                        </select>
            </div>
        </div>
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Valider les modifications</button>
                <a href="<?php echo e(url('users')); ?>" class="btn btn-danger mb-1">Annuler</a>
            </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playergg/resources/views/users/updateuser.blade.php ENDPATH**/ ?>