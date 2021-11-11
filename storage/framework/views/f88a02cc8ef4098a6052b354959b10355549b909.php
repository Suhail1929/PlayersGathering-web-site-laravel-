<?php $__env->startSection('title'); ?> Création d'une actualité <?php $__env->stopSection(); ?>
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
    <form action="<?php echo e(url('events')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3 row" >
            <label for="title" class="col-sm-2 col-form-label ">Nom de l'évènement</label>
            <div class="d-flex">
                <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" id="title"
                       placeholder="Saisir le titre de l'actualité " value="<?php echo e(old('title')); ?>"/>
            </div>
        </div>
        <div class="mb-3 row" >
            <label for="NumP" class="col-sm-2 col-form-label ">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="form-control <?php $__errorArgs = ['NumP'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="NumP" id="NumP"
                       placeholder="Saisir le titre de l'actualité " value="<?php echo e(old('NumP')); ?>"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Date de l'évènement </label>
            <div class="d-flex">
                <input type="datetime-local" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" id="date"
                       placeholder="Saisir la date de l'actualité " value="<?php echo e(old('date')); ?>"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="message" class="col-sm-2 col-form-label ">Déscription</label>
            <div class="d-flex">
 <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="message" name="message" rows="3"
           placeholder="Saisir le message de l'actualité "> <?php echo e(old('message')); ?></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
                <a href="<?php echo e(url('events')); ?>" class="btn btn-danger mb-1">Annuler</a>
            </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playersg/resources/views/events/create.blade.php ENDPATH**/ ?>