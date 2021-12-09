<?php $__env->startSection('title'); ?> Les 10 dernières actualités <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <i><?php echo e(strftime('%d/%m/%Y à %H:%M', strtotime($events->date))); ?></i><br/>
  <br>
  <h5 style="font-weight: bold"><?php echo e($events->title); ?></h5><br/>
  <p><?php echo e($events->message); ?></p>
  <em>par </em>
  <strong><?php echo e($events->user->name); ?></strong>
  
    
  <div class="offset-sm-0 col-sm-0">
    <br>
    <a href="<?php echo e(url('events/')); ?>">Retour à la liste</a>
    <br>
    
      <?php if(auth()->guard()->check()): ?>
      <br>
        <?php if($events->NumP != DB::table('membres')->where('events_id',$events->id)->count()): ?>
          <?php if(time() < strtotime($events->date)): ?>
            <form action="<?php echo e(route('membre.create')); ?>" method="get">
              <input name="events_id" hidden value="<?php echo e($events->id); ?>">
              <button class="btn btn-success">Participer</button>
            </form>
          <?php endif; ?>
        <?php endif; ?>
      <form>
        <br>
      <?php if(auth()->guard()->check()): ?>
        <?php if(Gate::allows('Utilisateur', $events)): ?>
          <a class="btn btn-dark" href="<?php echo e(route('events.edit',$events->id)); ?>">Editer</a>
        <?php endif; ?>
        <?php else: ?> <button type="submit" class="btn btn-secondary">Connecter pour participer</button>
      <?php endif; ?>
      </form>

      <form action="<?php echo e(route('membre.index')); ?>" method="GET">
      <?php if(auth()->guard()->check()): ?>
        <?php if(Gate::allows('Utilisateur', $events)): ?>
          <input name="events_id" hidden value="<?php echo e($events->id); ?>">
            <button class="btn btn-info" type="submit">La liste des Participants</button>
        <?php endif; ?>
        <?php else: ?> <button type="submit" class="btn btn-secondary">Connecter pour participer</button>
      <?php endif; ?>
      </form>

      <form action="<?php echo e(route('events.destroy', $events->id)); ?>" method="POST">
        <?php if(Gate::allows('Utilisateur', $events)): ?>
          <?php echo method_field('DELETE'); ?>
          <?php echo csrf_field(); ?>
          <?php if(auth()->guard()->check()): ?>
            <button type="submit" class="btn btn-danger">Supprimer</button>
          <?php endif; ?>
        <?php endif; ?>
      </form>
  </div>

      

    <?php endif; ?>

  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/a/resources/views/events/show.blade.php ENDPATH**/ ?>