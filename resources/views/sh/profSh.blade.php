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
                  
                      @foreach($data['prof'] as $prof)
               
                        <tr>
                            
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    {{$prof->name}}
                                </a>
                            </td>
                            <td>{{$prof->email}}</td>
                            
                            <td>
                                @if($prof->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($prof->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            <td>{{$prof->specialité}}</td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                          <form action="{{route('prof.edit')}}" method="post">
                                            @csrf
                                           <a href="#" onclick="this.closest('form').submit();return false;" class="dropdown-item">Edit</a>
                                     <input hidden name="id" value="{{$prof->id}}" >
                                        
                                        </form>
                                        <a href="#" class="dropdown-item" onclick="deleteProf(this)" fileid="{{$prof->id}}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>