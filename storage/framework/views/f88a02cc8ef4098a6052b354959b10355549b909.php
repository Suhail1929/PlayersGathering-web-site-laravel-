<?php $__env->startSection('title'); ?> Création d'un évènement <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <form action="<?php echo e(url('events')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3 row" >
            <label for="title" class="col-sm-2 col-form-label ">Titre de l'évènement</label>
            <div class="d-flex">
                <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" id="title"
                       placeholder="Saisir le titre de l'évènement " value="<?php echo e(old('title')); ?>"/>
            </div>
        </div>
        <div class="mb-3 row" >
            <label for="game" class="col-sm-2 col-form-label ">Nom de jeu</label>
                            <div class="d-flex">
                            <select name="game" value="<?php echo e(old('game')); ?>" class="form-control <?php $__errorArgs = ['game'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control choix-input">
                            <option value="League of Legends">League of Legends</option>
                            <option value="Counter-Strike: Global Offensive">Counter-Strike: Global Offensive</option>
                            <option value="VALORANT">VALORANT</option>
                            <option value="AMONG US">AMONG US</option>
                            <option value="APEX LEGENDS">APEX LEGENDS</option>
                            <option value="FORTNITE">FORTNITE</option>
                            <option value="TEAM FORTRESS 2">TEAM FORTRESS 2</option>
                            <option value="DOTA 2">DOTA 2</option>
                            <option value="OVERWATCH">OVERWATCH</option>
                            <option value="WARZONE">WARZONE</option>
                            <option value="FIFA 2022">FIFA 2022</option>
                            <option value="ROCKET LEAGUE">ROCKET LEAGUE</option>
                            <option value="GRAND THEFT AUTO ONLINE">GRAND THEFT AUTO ONLINE</option>
                            <option value="Minecraft">Minecraft</option>
                            <option value="autre">autre</option>
                        </select>
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
                       placeholder="Saisir le nombre de participant maximale" value="<?php echo e(old('NumP')); ?>"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Date de l'évènement</label>
            <div class="d-flex">
                <input type="datetime-local" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date" id="date"
                       placeholder="Saisir la date de l'évènement " value="<?php echo e(old('date')); ?>"/>
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
           placeholder="Vous pouvez presicer plus de details à propos votre évènement "> <?php echo e(old('message')); ?></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
                <a href="<?php echo e(url('events')); ?>" class="btn btn-danger mb-1">Annuler</a>
            </div>
    </form>
    <script>$(".choix-input").select2({ tags: true});</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playersg/resources/views/events/create.blade.php ENDPATH**/ ?>