<?php $__env->startSection('title'); ?> Les 10 dernières actualités <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<i><?php echo e(strftime('%d/%m/%Y à %H:%m', strtotime($events->date))); ?></i><br/>
<strong><?php echo e($events->title); ?></strong>
<?php echo e($events->message); ?><br/>
<em>par <?php echo e($events->user->name); ?></em><br/>
<a href="<?php echo e(url('events/')); ?>">Retour à la liste</a>
<?php if(auth()->guard()->check()): ?>
<?php if(time() < strtotime($events->date)): ?>
<a class="btn btn-success" href="<?php echo e(route('events.show', $events->id)); ?>">Participer</a>
<?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/garz0002/public_html/projet303/resources/views/events/show.blade.php ENDPATH**/ ?>