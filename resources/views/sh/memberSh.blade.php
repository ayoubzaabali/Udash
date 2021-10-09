                        <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="user-list-select-all">
                                    <label class="custom-control-label" for="user-list-select-all"></label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach($data['members'] as $member)
                        <tr>
                            <td>
                              
                                <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">M</span>
                                 
                                        </figure>  
                        </td>
                             
                            <td>
                                <a href="#">
                                       
                                    {{$member->name}}
                                </a>
                            </td>
                            <td>{{$member->email}}</td>
                            
                            <td>
                                @if($member->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($member->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="{{$data['catId']}}" admin="{{$member->id}}" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>
                    