<?php $__env->startSection('title'); ?> Détails du participant <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php
$name = DB::table('users')->where('id',$membre->getAttributes()['user_id'])->get();
?>
  <h6 class="text-success" style="font-weight: bold">Nom sur le site :</h6>
  <p><?php echo e($name[0]->name); ?> </p><br>
  <h6 class="text-success" style="font-weight: bold">Prénom et Nom :</h6>
  <h5 style="font-weight: bold"><?php echo e($membre->prenom); ?> <?php echo e($membre->nom); ?> </h5><br/>
  <h6 class="text-success" style="font-weight: bold">Description : </h6>
  <p><?php echo e($membre->description); ?></p>
  <h6 class="text-success" style="font-weight: bold">Adresse Mail : </h6>
  <p><?php echo e($membre->mail); ?></p>
  <h6 class="text-success" style="font-weight: bold">Date de Naissance :</h6>
  <p><?php echo e(strftime('%d/%m/%Y', strtotime($membre->datenaissance))); ?></p>
  
    
  <div class="offset-sm-0 col-sm-0">
        <br>
            <a href="<?php echo e(url('events/')); ?>">Retour à la liste des événements</a>
        <br>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/a/resources/views/membre/show.blade.php ENDPATH**/ ?>