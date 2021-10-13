@extends('layouts.layout')
@section('content')
        <script src="<?php echo asset('vendors/dropzone/dropzone.js')  ?>"></script>
     

  <!-- Content -->
  
    <section class='statis text-center'>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="box bg-primary-gradient   ">
              <i class="fa fa-eye"></i>
              <h3>{{$data['Scount']}}</h3>
              <p class="lead">Students</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-secondary-gradient ">
              <i class="fa fa-user-o"></i>
              <h3>{{$data['Pcount']}}</h3>
              <p class="lead">Professors</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-success-gradient ">
              <i class="fa fa-shopping-cart"></i>
              <h3>{{$data['Acount']}}</h3>
              <p class="lead">Administrative</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-warning-gradient ">
              <i class="fa fa-handshake-o"></i>
              <h3>{{$data['Fcount']}}</h3>
              <p class="lead">Files</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <div class="row">
        <div class="col-md-8">
            
            <h4>Daily Usage</h4>
            <div id="daily-usage">
            
            
            
            
            </div>

        </div>
        <div class="col-md-4" >
            <div class="card">
                <div class="card-body text-center">
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <img src="<?php echo asset('assets/media/image/report.svg')  ?>" class="img-fluid" alt="report">
                        </div>
                    </div>
                    <h4 class="my-3">Navigate Instances Page</h4>
                    <p class="text-muted">manage your Instances and files easily.</p>
                    <button class="btn btn-outline-primary btn-lg2" onclick="window.location.replace('http://docs.smart-ensa.com/I/categories');">GO</button>
                </div>
            </div>
        </div>
    </div>
<div style="display:none" class="row">
<div   class="col-md-12" id="chartu">
    <div class="content-title d-flex justify-content-between">
        <h4>Live Chart</h4>
    </div>
 <div id="chartContainer" style="height: 300px; width: 100%;">
            
            
            
            
</div>
    
</div>



</div>
    <div class="content-title d-flex justify-content-between">
        <h4>Top Instances(File Based)</h4>
        <a href="{{route('dash.catsFiles')}}">View All</a>
    </div>

    <div class="row">
    @php
   $array_count_files=[];
@endphp   
@foreach($data['categories'] as $category)
 @php
   array_push($array_count_files,$category->file_count);
@endphp
        <div class="col-md-3">
            <div class="card  ">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class=" ">
                            <i class="font-size-22 ti-folder"></i>
                        </div>
                    
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5>{{$category->name}}</h5>
                        <div class="dropdown">
                            <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="post" action="{{ route('cat.homePost') }}">
                                @csrf
                                <input type="text" name="catId" hidden value="{{$category->id}}">
                                 <a  class="dropdown-item" onclick="this.closest('form').submit()" >View Details</a>                            

                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">{{$category->file_count}} Files</p>
                </div>
            </div>
        </div>
    @endforeach 
         @php
$array_count_files=json_encode($array_count_files);
        @endphp
        <script type="application/javascript">
              console.log('data');
    var data = JSON.parse("{{$array_count_files}}") ;
    console.log(data);
        </script>
   
    </div>


    <div class="content-title d-flex justify-content-between">
        <h4>Recent Files(Last Month)</h4>
        <a href="{{route('RecentFiles')}}">View All</a>
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



    <div class="content-title d-flex justify-content-between">
        <h4>Top Instances (User Based)</h4>
        <a href="{{route('dash.ListCatsUsers')}}">View All</a>
    </div>

    <div class="row">
@php
   $array_count_files=[];
   $names=[];
   $i=0;
@endphp  

      
@foreach($data['categoriesU'] as $category)
 @php
   array_push($array_count_files,$category->user_count);
   $names[$i]=$category->name;
   $i++;
@endphp
        <div class="col-md-3 ">
            <div class="card bg-warning-gradient    ">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <i class="font-size-22 ti-folder"></i>
                        </div>
                    
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5>{{$category->name}}</h5>
                        <div class="dropdown">
                            <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="post" action="{{ route('cat.homePost') }}">
                                @csrf
                                <input type="text" name="catId" hidden value="{{$category->id}}">
                                 <a  class="dropdown-item" onclick="this.closest('form').submit()" >View Details</a>                            

                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">{{$category->user_count}} Member</p>
                </div>
            </div>
        </div>
    @endforeach  
        
 @php
$array_count_files=json_encode($array_count_files);
        $names=json_encode($names);

        @endphp
              
<div hidden id="dataAxis" IpAdress="{{$names}}"></div>
        <script type="application/javascript">
    var data3=JSON.parse(document.getElementById("dataAxis").getAttribute('IpAdress'));
 ;
    var data2 = JSON.parse("{{$array_count_files}}") ;
        </script>
    </div>
<!-- Dashboard scripts -->
<script src="<?php echo asset('assets/js/examples/pages/file-dashboard.js')  ?>"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="<?php echo asset('assets/js/examples/pages/scatter.js')  ?>"></script>

@endsection
