<?php $__env->startSection('title'); ?> La liste des participants <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="card-header pb-0">
    <h6>Liste des participants</h6>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <div class="scrollit">
        <table class="table align-items-center mb-0" class="table">
          
          <thead>
            <tr>
              <th class="text-secondary opacity-7 ps-1"></th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Prénom</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Nom</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-6">Jeu préféré</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Date de Naissance</th>
              <th class="text-secondary opacity-7"></th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <?php
                $id=(int) $_GET['events_id'];
                $membreList=DB::table('membres')->where('events_id', $id)->get();
            ?>   
            <?php $__currentLoopData = $membreList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
              <tr>
                <td class="px-3">
                  <img src="<?php echo e(asset('image/gamer.png')); ?>" class="avatar avatar-sm me-3 ps-1" alt="user1">
                </td>
                <td>
                  <p class="text-xs mb-0 font-weight-bold px-2"><?php echo e($membre->prenom); ?></p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 px-1"><?php echo e($membre->nom); ?></p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 px-3"><?php echo e($membre->jeupref); ?></p>
                </td>
                <td>
                  <span class="text-xs font-weight-bold mb-0"><?php echo e(strftime('%d/%m/%Y', strtotime($membre->datenaissance))); ?></span>
                </td>
                <td class="align-middle">
                    <a href="<?php echo e(route('membre.show', $membre->id)); ?>" class="btn btn-info" data-toggle="tooltip" data-original-title="Edit user">
                      Consulter
                    </a>
                </td>
                <td class="align-middle">
                  <form action="<?php echo e(route('membre.destroy', ['membre' => $membre->id])); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">
                      Supprimer
                    </button>
                  </form>
              </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>         
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/a/resources/views/membre/list.blade.php ENDPATH**/ ?>