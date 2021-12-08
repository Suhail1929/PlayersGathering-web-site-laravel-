<?php $__env->startSection('title'); ?> page d'accueil <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>  
   <div class="container-fluid py-4">
      
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 class="font-weight-bolder">Vous pouvez organiser votre propre événement.</h5>
                    <p class="mb-5">Laissez des personnes rejoindre votre événement ou invitez-en pour jouer en communauté</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="<?php echo e(route('events.create')); ?>">
                      Créez votre événement ici
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    
                    <div class="position-relative d-flex align-items-center justify-content-center h-90">
                      <img class="w-90 position-relative z-index-2 pt-2" src="<?php echo e(asset('image/manette.png')); ?>" >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url(https://static.cnews.fr/sites/default/files/styles/image_880_495/public/williams.jpg?itok=R8BsH-0y);">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">Trouvez la communauté qui vous correspond.</h5>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="<?php echo e(url('/events')); ?>">
                      La liste des événements en cours ici
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true" ></i>
                    </a>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 513px;"></div></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/garz0002/public_html/projetinfo303/resources/views/index.blade.php ENDPATH**/ ?>