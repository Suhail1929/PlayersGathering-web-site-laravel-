<?php $__env->startSection('title'); ?> Formulaire de participation
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    

    <form action="<?php echo e(url('membre')); ?>" method="post" class="espaceinput" >
        <?php echo csrf_field(); ?>
        <input name="events_id" id="events_id" hidden value="<?php echo e($_GET['events_id']); ?>">

        
        <div class="mb-2 row" >
            <label for="nom" class="col-sm-2 col-form-label ">Votre Nom</label>
            <div class="d-flex">
                <input type="text" class="form-control <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nom" id="nom" placeholder="Saisir votre nom" value="<?php echo e(old('nom')); ?>"/>
            </div>
        </div>

        
        <div class="mb-2 row" >
            <label for="prenom" class="col-sm-2 col-form-label ">Votre Prénom</label>
            <div class="d-flex">
                <input type="text" class="form-control <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="prenom" id="prenom" placeholder="Saisissez votre prénom" value="<?php echo e(old('prenom')); ?>"/>
            </div>
        </div>

        
        <div class="mb-2 row" >
            <label for="mail" class="col-sm-2 col-form-label ">Mail</label>
            <div class="d-flex">
                <input type="text" class="form-control <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mail" id="mail" placeholder="Saisissez votre adresse mail" value="<?php echo e(old('mail')); ?>"/>
            </div>
        </div>

        
        <div class="mb-2 row" >
            <label for="jeupref" class="col-sm-2 col-form-label ">Votre jeu préféré</label>
            <div class="d-flex">
                <input type="text" class="form-control <?php $__errorArgs = ['jeupref'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="jeupref" id="jeupref" placeholder="Saisissez votre jeu préféré" value="<?php echo e(old('jeupref')); ?>"/>
            </div>
        </div>

        
        <div class="mb-2 row">
            <label for="datenaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="d-flex">
                <input type="date" class="form-control <?php $__errorArgs = ['datenaissance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="datenaissance" id="datenaissance" placeholder="Saisissez votre date de naissance" value="<?php echo e(old('datenaissance')); ?>"/>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label for="description" class="col-sm-0 col-form-label">Description</label>
            <div class="d-flex">
                <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description" placeholder="Décrivez-vous en quelques mots"> <?php echo e(old('description')); ?></textarea>
            </div>
        </div>

        
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Participer</button>
                <a href="<?php echo e(url('events')); ?>" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>
        
    </form>

    <script>$(".choix-input").select2({ tags: true});</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/a/resources/views/membre/create.blade.php ENDPATH**/ ?>