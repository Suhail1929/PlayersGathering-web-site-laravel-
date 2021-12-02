<?php $__env->startSection('title'); ?> Les 10 dernières actualités <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<i><?php echo e(strftime('%d/%m/%Y à %H:%M', strtotime($events->date))); ?></i><br/>
<strong><?php echo e($events->title); ?></strong>
<?php echo e($events->message); ?><br/>
<em>par <?php echo e($events->user->name); ?></em><br/>
<a href="<?php echo e(url('events/')); ?>">Retour à la liste</a>
<?php if(auth()->guard()->check()): ?>
<?php if(time() < strtotime($events->date)): ?>
<a class="btn btn-success" href="<?php echo e(route('events.show', $events->id)); ?>">Participer</a>
<?php endif; ?>
<?php if(auth()->guard()->check()): ?>
        <?php if(Gate::allows('Utilisateur', $events)): ?>
        <a class="btn btn-warning" href="<?php echo e(route('events.edit',$events->id)); ?>">Editer</a> 
        <?php endif; ?>
        <?php else: ?> <button type="submit" class="btn btn-secondary">connecter pour participer </button> 
        <?php endif; ?>
        <form action="<?php echo e(route('events.destroy', $events->id)); ?>" method="POST">
        <?php if(Gate::allows('Utilisateur', $events)): ?>
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
        <?php if(auth()->guard()->check()): ?>
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <?php endif; ?>
        <?php endif; ?>
      </form>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playergg/resources/views/events/show.blade.php ENDPATH**/ ?>