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
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">S</span>
                                        </figure>
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
                       
                        </tbody><?php /**PATH C:\xampp\htdocs\Udash\resources\views/sh/etdSh.blade.php ENDPATH**/ ?>