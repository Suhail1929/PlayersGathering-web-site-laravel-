<?php $__env->startSection('title'); ?> Les 10 dernières actualités <?php $__env->stopSection(); ?>
<?php $__env->startSection('rechercheBarre'); ?>
<div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un évènement..." />
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

            <div class="card-header pb-0">
              <h6>Liste des évènements</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2 " >
              <div class="table-responsive p-0">
              <div class="scrollit">
<table class="table align-items-center mb-0" class="table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Evenement</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jeu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date </th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  
                  <tbody class="tableevent">
                  
                  <?php $__currentLoopData = $eventsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-elements-16/117/gamepad-256.png" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo e($events->title); ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo e($events->user->name); ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo e($events->game); ?></p>
                        <p class="text-xs text-secondary mb-0"><?php echo e($events->NumP); ?> participants</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if(strtotime($events->date)>time()): ?>
                        <span class="badge badge-sm bg-gradient-success">Disponible</span>
                        <?php else: ?> <span class="badge badge-sm bg-gradient-secondary">Indisponible</span>
                        <?php endif; ?>
                        
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo e(strftime('%d/%m/%Y à %H:%M', strtotime($events->date))); ?></span>
                      </td>
                      <td class="align-middle">
                        <a href="<?php echo e(route('events.show', $events->id)); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Consulter
                        </a>
                      </td>
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
</tbody>
                  <?php $__env->stopSection(); ?>













<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playergg/resources/views/events/list.blade.php ENDPATH**/ ?>