
<?php $__env->startSection('content'); ?>
        <script src="<?php echo asset('vendors/dropzone/dropzone.js')  ?>"></script>
     


    <div class="row">
        <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Students</h2>
           
                
            </div>
            

            <div class="card border-0">
                
            <div class="row">
            <div class="col-sm-12 col-md-6">
                    <div id="user-list_filter" class="dataTables_filter">
                      <label style="float:left">Search: <input onkeyup="etdSH(this)" type="search" style=" width:1000px" class="form-control form-control-sm" placeholder="" aria-controls="user-list">
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="user-list_length">
                      <label style="visibility:hidden">Show <form method="get" action="<?php echo e(route('prof.home')); ?>">
                          <select style="visibility:hidden" onchange="this.form.submit()" name="show" aria-controls="user-list" class="custom-select custom-select-sm form-control form-control-sm">
                            <option selected="true" disabled></option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                        </form>
                      </label>
                    </div>
                  </div>
                 
                </div>
                
              
                <div class="table-responsive">
                    
                    <table id="etd-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Specialité</th>
                            <th>Apoge</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      <?php $__currentLoopData = $data['etd']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                          
                            <td>
                                <a href="#">
                            <?php if(empty($etd->photo) or is_null($etd->photo)): ?>

                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    

                               <?php else: ?>
                                <figure class="avatar avatar-sm">

                                         <img   src="<?php echo e(url('/').'/storage/app/'.$etd->photo); ?>"
                                             class="rounded-circle" alt="image">
                                        
                                </figure>
                                <?php endif; ?>
                                    <?php echo e($etd->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($etd->email); ?></td>
                            
                            <td>
                                <?php if($etd->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($etd->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($etd->classe); ?></td>
                            
                            <td>
                                <?php echo e($etd->apoge); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </tbody>
                    </table>
                </div>
                
                
          
                
                
            </div>
        </div>
    </div>

      <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="user-list_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="user-list_paginate"><ul style="float:right" class="pagination"><?php echo $data['etd']->render(); ?></ul></div></div></div>

<script>var  htmlinitetd= document.getElementById("etd-list").innerHTML;
</script>
<script type="application/javascript" src="<?php echo asset('assets/js/scripy.js')  ?>"></script>










<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views\etd.blade.php ENDPATH**/ ?>