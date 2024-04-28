                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Specialité</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      <?php $__currentLoopData = $data['prof']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    <?php echo e($prof->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($prof->email); ?></td>
                            
                            <td>
                                <?php if($prof->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($prof->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($prof->specialité); ?></td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                          <form action="<?php echo e(route('prof.edit')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                           <a href="#" onclick="this.closest('form').submit();return false;" class="dropdown-item">Edit</a>
                                     <input hidden name="id" value="<?php echo e($prof->id); ?>" >
                                        
                                        </form>
                                        <a href="#" class="dropdown-item" onclick="deleteProf(this)" fileid="<?php echo e($prof->id); ?>">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </tbody><?php /**PATH C:\xampp\htdocs\Udash\resources\views/sh/profSh.blade.php ENDPATH**/ ?>