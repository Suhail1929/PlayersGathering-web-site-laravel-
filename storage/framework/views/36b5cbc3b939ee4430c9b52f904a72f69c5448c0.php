<?php $__env->startSection('title'); ?> Liste des utilisateurs <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card-header pb-0">
              <h6>La liste des utilisateurs</h6>
            </div>
<table >
  <tbody>
    <?php $__currentLoopData = $usersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td class="collapsing">
        <?php if($users->id_role==3): ?>  
        <img src="https://cdn-icons-png.flaticon.com/512/109/109819.png" style="width: 20px;" >
        <?php elseif($users->id_role==2): ?>    
        <img src="https://iconarchive.com/download/i91958/icons8/windows-8/Users-Administrator-2.ico" style="width: 20px;" >
        <?php elseif($users->id_role==1): ?>
        <img src="http://simpleicon.com/wp-content/uploads/user1.png" style="width: 20px;" >
        <?php endif; ?>
      </td>
      <td><strong><?php echo e($users->name); ?></td>
      <td><strong><?php echo e($users->email); ?></td>
      <td><?php echo e(strftime('%d/%m/%Y à %H:%m', strtotime($users->created_at))); ?></td>
      <td>
      <?php if($users->id_role==3): ?>  
        <strong>Admin</strong>
        <?php elseif($users->id_role==2): ?>    
        <strong>Utilisateur</strong>
        <?php elseif($users->id_role==1): ?>
        <strong>Visiteur</strong>
        <?php endif; ?>
      </td>
      <td>
      <a class="btn btn-warning" href="<?php echo e(route('users.edit',$users->id)); ?>">Modifier</a> 
      </td>
      <td>
      <form action="<?php echo e(route('users.destroy', ['user' => $users->id])); ?>" method="POST">
      <?php echo method_field('DELETE'); ?>
      <?php echo csrf_field(); ?>
      <button type="submit" class="btn btn-info">Supprimer</button>
    </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playersg/resources/views/users/ListeUtilisateur.blade.php ENDPATH**/ ?>