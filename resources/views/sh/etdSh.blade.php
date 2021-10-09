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
                  
                      @foreach($data['etd'] as $etd)
               
                        <tr>
                            
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">S</span>
                                        </figure>
                                    {{$etd->name}}
                                </a>
                            </td>
                            <td>{{$etd->email}}</td>
                            
                            <td>
                                @if($etd->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($etd->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            <td>{{$etd->classe}}</td>
                            
                            <td>
                                {{$etd->apoge}}
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>