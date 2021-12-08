<?php $__env->startSection('title'); ?> Inscription valide <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div>
        <a href="<?php echo e(url('events/')); ?>">Retour à la liste des événements</a>
    </div>
    <br>
    <div>
        <h5>Vous êtes bien inscrit dans cet événement.</h5>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/garz0002/public_html/projetinfo303/resources/views/membre/valid.blade.php ENDPATH**/ ?>