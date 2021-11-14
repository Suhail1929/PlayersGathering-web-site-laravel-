<?php $__env->startSection('title'); ?> Les 10 dernières actualités <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<table>
  <tbody>
    <?php $__currentLoopData = $eventsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><img src="http://cdn.onlinewebfonts.com/svg/img_452021.png" style="width: 20px;" ></td>
      <td><strong><?php echo e($events->title); ?></strong>
      </br> 
      </td>
      <td> 
        <strong>Le nombre maximal de participants est: <i><?php echo e($events->NumP); ?></i> </strong> 
      </br> 
    </td>
    <td><?php echo e(strftime('%d/%m/%Y à %H:%m', strtotime($events->date))); ?></td>
    <td><a class="btn btn-primary" href="<?php echo e(route('events.show', $events->id)); ?>">Consulter</a></td>
    <td><form action="<?php echo e(route('events.destroy', $events->id)); ?>" method="POST">
      <?php echo method_field('DELETE'); ?>
      <?php echo csrf_field(); ?>
      <?php if(auth()->guard()->check()): ?>
      <button type="submit" class="btn btn-info">Supprimer</button>
      <?php endif; ?>
    </form></td>
    <td>
      <?php if(auth()->guard()->check()): ?>
      
      <?php if(Gate::allows('Utilisateur', $events)): ?>
        <a class="btn btn-warning" href="<?php echo e(route('events.edit',$events->id)); ?>">Editer</a> 
        <?php endif; ?>
   <?php else: ?> <button type="submit" class="btn btn-secondary">connecter pour participer </button> 
   
   <?php endif; ?>
   </td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playersg/resources/views/events/list.blade.php ENDPATH**/ ?>