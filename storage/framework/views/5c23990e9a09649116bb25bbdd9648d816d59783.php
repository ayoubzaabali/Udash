                        <thead>
                        <tr>
                            <th>
                               
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      <?php $__currentLoopData = $data['admins']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                             <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">A</span>
                                        </figure>
                            
                            </td>
                            <td>
                                <a href="#">
                                      
                                    <?php echo e($emp->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($emp->email); ?></td>
                            
                            <td>
                                <?php if($emp->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($emp->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="<?php echo e($data['catId']); ?>" admin="<?php echo e($emp->id); ?>" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </tbody>
<?php /**PATH C:\xampp\htdocs\Udash\resources\views/sh/adminSh.blade.php ENDPATH**/ ?>