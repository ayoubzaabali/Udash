   


@extends('layouts.layout')
@section('content')
<div class="content-title d-flex justify-content-between">
        <h4>Recent Files</h4>
        <a href="#">View All</a>
    </div>            
    
     <div class="mb-4">
    <div class="table-responsive">
                
                
                
                
                
                <table id="table-files"  class="table table-borderless table-hover">
                    
                    <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Added</th>
                        <th>Added By</th>
                        <th></th>
                    </tr>
                    </thead>
                   
                    <tbody>
                    @foreach($data['files'] as $file)
                     
              
                    <tr>
                        <td>
                            <a href="{{url('/').'/download/'.$file->id}}" class="d-flex align-items-center">
                                <figure class="avatar avatar-sm mr-3">
                                  
                                    
                                    <?php $testo=strtolower(pathinfo(storage_path($file->path),PATHINFO_EXTENSION)) ?>
                                    @if($testo=="pdf")
                                    <span class="avatar-title bg-primary-gradient  rounded-pill">
                                        
                                        <i class="fa fa-file-pdf-o"></i>
                                        
                                        
                                    </span>
                                    @elseif ($testo=="jpeg" or $testo=="jpg"  )
                                    
                                    <span class="avatar-title bg-secondary-gradient  rounded-pill">
                                        
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        
                                        
                                    </span> 

                                    @elseif ($testo=="docx")
                                    
                                    <span class="avatar-title bg-info-gradient   rounded-pill">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    @elseif ($testo=="doc")
                                    
                                    <span class="avatar-title bg-info  rounded-pill">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    @elseif ($testo=="png")
                                    
                                    <span class="avatar-title bg-success-gradient   rounded-pill">
                                        
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>


                                        
                                        
                                    </span>
 
                                    @elseif ($testo=="csv")
                                    
                                    <span class="avatar-title bg-success-gradient   rounded-pill">
                                        
                                        <i class="fa fa-table" aria-hidden="true"></i>



                                        
                                        
                                    </span>
                                    @elseif ($testo=="xlsx" or $testo=="xls" )
                                    
                                    <span class="avatar-title bg-success   rounded-pill">
                                        
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>

                                    @elseif ($testo=="sql")
                                    
                                    <span class="avatar-title bg-light   rounded-pill">
                                        
                                        <i class="fa fa-database" aria-hidden="true"></i>



                                        
                                        
                                    </span> 
                                    @else
                                    
                                    <span class="avatar-title bg-dark-gradient   rounded-pill">
                                        
                                        <i class="fa fa-file-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>                                    
                                    @endif

                                </figure>
                                <span class="d-flex flex-column">
                                    <span class="text-primary">{{$file->original}}</span>
                                    <span class="small font-italic">{{$file->size * 0.001 }} KB</span>
                                </span>
                            </a>
                        </td>
                        <td>{{$file->date}}</td>
                        <td>
                            <div class="badge bg-info-bright text-info">{{$file->name}}</div>
                        </td>
                        
                  
                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item" date="{{$file->date}}" original="{{$file->original}}" size="{{$file->size * 0.001}}" owner="{{$file->name}}" fileid="{{url('/').'/download/'.$file->id}}" data-sidebar-target="#view-detail">View
                                        Details</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
                </div>

 @endsection
   
    
    
        