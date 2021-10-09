
    
    
    
    
    
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">Type</th>
		      <th scope="col">File Name</th>
		      <th scope="col">Word Count</th>
		      <th scope="col">Creation Date</th>
		    </tr>
		  </thead>
		  <tbody>
    @foreach($data['files'] as $file)
    @if(!is_null($file))
  
		   <tr onmouseover="this.style.transform='scale(1.1)';this.style.color='#E23C3C'" onmouseout="this.style.transform='scale(1)';this.style.color='black'" >
		      <td onclick="window.open('{{url('/').'/download/'.$file->id}}', '_blank');"  style="cursor:pointer" class="w-25">
                                <figure class="avatar avatar-xl img-fluid ">

			     
                                    
                                    <?php $testo=strtolower(pathinfo(storage_path($file->path),PATHINFO_EXTENSION)) ?>
                                    @if($testo=="pdf")
                                    <span class="avatar-title bg-primary-gradient  ">
                                        
                                        <i class="fa fa-file-pdf-o"></i>
                                        
                                        
                                    </span>
                                    @elseif ($testo=="jpeg" or $testo=="jpg"  )
                                    
                                    <span class="avatar-title bg-secondary-gradient  ">
                                        
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        
                                        
                                    </span> 

                                    @elseif ($testo=="docx")
                                    
                                    <span class="avatar-title bg-info-gradient  ">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    @elseif ($testo=="doc")
                                    
                                    <span class="avatar-title bg-info  ">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    @elseif ($testo=="png")
                                    
                                    <span class="avatar-title bg-success-gradient   ">
                                        
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>


                                        
                                        
                                    </span>
 
                                    @elseif ($testo=="csv")
                                    
                                    <span class="avatar-title bg-success-gradient   ">
                                        
                                        <i class="fa fa-table" aria-hidden="true"></i>



                                        
                                        
                                    </span>
                                    @elseif ($testo=="xlsx" or $testo=="xls" )
                                    
                                    <span class="avatar-title bg-success  ">
                                        
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>

                                    @elseif ($testo=="sql")
                                    
                                    <span class="avatar-title bg-light   ">
                                        
                                        <i class="fa fa-database" aria-hidden="true"></i>



                                        
                                        
                                    </span> 
                                    @else
                                    
                                    <span class="avatar-title bg-dark-gradient   ">
                                        
                                        <i class="fa fa-file-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>                                    
                                    @endif
                  </figure>

		      </td>
		      <td>{{$file->original}}</td>
		      <td>{{$file->num}}</td>
		      <td> <span class="badge badge-success">{{$file->date}}</span></td>
               
		    </tr>
              
      @endif
    
    
    
    
      @endforeach

		  </tbody>
		</table>   
    </div>
  </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  