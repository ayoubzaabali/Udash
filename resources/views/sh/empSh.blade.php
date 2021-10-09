   <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Poste</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      @foreach($data['emp'] as $emp)
               
                        <tr>
                            
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
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
                            <td>{{$emp->poste}}</td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{route('emp.edit')}}" method="post">
                                            @csrf
                                           <a href="#" onclick="this.closest('form').submit();return false;" class="dropdown-item">Edit</a>
                                     <input hidden name="id" value="{{$emp->id}}" >
                                        
                                        </form>
                                        <a href="#" class="dropdown-item"  onclick="deleteEmp(this)" fileid="{{$emp->id}}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>