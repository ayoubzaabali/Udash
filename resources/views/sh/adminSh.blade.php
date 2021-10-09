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
                  
                      @foreach($data['admins'] as $emp)
               
                        <tr>
                            <td>
                             <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">A</span>
                                        </figure>
                            
                            </td>
                            <td>
                                <a href="#">
                                      
                                    {{$emp->name}}
                                </a>
                            </td>
                            <td>{{$emp->email}}</td>
                            
                            <td>
                                @if($emp->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($emp->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="{{$data['catId']}}" admin="{{$emp->id}}" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>
