<?php $__env->startSection('title'); ?> Modifier un utilisateur <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <form action="<?php echo e(url('users',$users->id)); ?>" method="post">
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
                            <option value="3">Admin</option>
                            <option value="2">Utilisateur</option>
                            <option value="1">Visiteur</option>
                        </select>
            </div>
        </div>
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
                <a href="<?php echo e(url('userslist')); ?>" class="btn btn-danger mb-1">Annuler</a>
            </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playersg/resources/views/events/updateuser.blade.php ENDPATH**/ ?>