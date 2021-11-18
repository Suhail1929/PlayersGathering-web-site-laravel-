<?php $__env->startSection('title'); ?> Modifier une actualité <?php $__env->stopSection(); ?>
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
    <form action="<?php echo e(url('events', $events->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Nom de l'évènement</label>
            <div class="d-flex">
                <input type="text" class="form-control" name="title" id="title"
                       placeholder="Saisir le titre de l'actualité" value="<?php echo e($events->title); ?>"/>
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
unset($__errorArgs, $__bag); ?>">
                            <option >Choissez un jeu:</option>
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
        <div class="mb-3 row">
            <label for="NumP" class="col-sm-2 col-form-label">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="form-control" name="NumP" id="NumP"
                       placeholder="Saisir le titre de l'actualité" value="<?php echo e($events->NumP); ?>"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Date de l'évènement</label>
            <div class="d-flex">
                <input type="datetime-local" class="form-control" name="date" id="date"
                       placeholder="Saisir la date de l'actualité" value="<?php echo e(date('Y-m-d\TH:i', strtotime($events->date))); ?>"/>
            </div>
        </div>
         <div class="mb-3 row">
            <label for="message" class="col-sm-2 col-form-label">Déscription</label>
            <div class="d-flex">
 <textarea class="form-control" id="message" name="message" rows="3"
           placeholder="Saisir le message de l'actualité"><?php echo e($events->message); ?></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
                <a href="<?php echo e(route('events.show',$events->id)); ?>" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>
    </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/garz0002/public_html/projet303/resources/views/events/edit.blade.php ENDPATH**/ ?>