<?php $__env->startSection('title'); ?> Liste des utilisateurs <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="card-header pb-0">
              <h6>La liste des utilisateurs</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div class="scrollit">
<table class="table align-items-center mb-0" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Evenement</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date d'inscription</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  
                  <?php $__currentLoopData = $usersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          <?php if($users->id_role==1): ?>  
                          <img src="https://cdn-icons-png.flaticon.com/512/109/109819.png" class="avatar avatar-sm me-3" >
                          <?php elseif($users->id_role==2): ?>    
                          <img src="https://iconarchive.com/download/i91958/icons8/windows-8/Users-Administrator-2.ico" class="avatar avatar-sm me-3" >
                          <?php elseif($users->id_role==3): ?>
                          <img src="http://simpleicon.com/wp-content/uploads/user1.png" class="avatar avatar-sm me-3" >
                          <?php endif; ?>

                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo e($users->name); ?></h6>
                            <p class="text-xs text-secondary mb-0">
                            <?php echo e($users->email); ?>

                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                        <?php if($users->id_role==3): ?>  
                              <strong>Utlisateur</strong>
                              <?php elseif($users->id_role==2): ?>    
                              <strong>Modérateur</strong>
                              <?php elseif($users->id_role==1): ?>    
                              <strong>Admin</strong>
                              <?php endif; ?>
                        </p>
                        
                      </td>
                      <td >
                      <p class="text-xs font-weight-bold mb-0"><?php echo e(strftime('%d/%m/%Y à %H:%m', strtotime($users->created_at))); ?></p>        
                      </td>
                      <td class="align-middle">
                        <?php if(Auth::user()->id_role==1): ?>
                          <?php if($users->id_role==2 || $users->id_role==3): ?>
                          <a class="btn btn-warning" href="<?php echo e(route('users.edit',$users->id)); ?>">
                        Modifier
                      </a> 
                          <?php endif; ?>
                        <?php elseif(Auth::user()->id_role==2): ?>
                          <?php if($users->id_role==3): ?>
                          <a class="btn btn-warning" href="<?php echo e(route('users.edit',$users->id)); ?>">
                        Modifier
                      </a> 
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                      <td class="align-middle">
                      <?php if(Auth::user()->id_role==1): ?>
                        <?php if($users->id_role==2 || $users->id_role==3): ?>
                        <form action="<?php echo e(route('users.destroy', ['user' => $users->id])); ?>" method="POST">
                      <?php echo method_field('DELETE'); ?>
                      <?php echo csrf_field(); ?>
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                        <?php endif; ?>
                      <?php elseif(Auth::user()->id_role==2): ?>
                        <?php if($users->id_role==3): ?>
                        <form action="<?php echo e(route('users.destroy', ['user' => $users->id])); ?>" method="POST">
                      <?php echo method_field('DELETE'); ?>
                      <?php echo csrf_field(); ?>
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    
                        <?php endif; ?>
                        
                         <?php endif; ?>
                      </td>
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                    
                    </table>
                    </div>
</div>
</div>


                  <?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtar0001/public_html/playergg/resources/views/users/ListeUtilisateur.blade.php ENDPATH**/ ?>