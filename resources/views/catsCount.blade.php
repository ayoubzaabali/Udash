@extends('layouts.layout')
@section('content')    
<div class="content-title d-flex justify-content-between">
        <h4>Top Categories</h4>
    </div>

    <div class="row">
      
@foreach($data['categories'] as $category)
        <div class="col-md-3">
            <div class="card">
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
                                <a href="#" class="dropdown-item" data-sidebar-target="#view-detail">View Details</a>                            
                            </div>
                        </div>
                    </div>
                    <p class="small text-muted mb-0">{{$category->file_count}} Files</p>
                </div>
            </div>
        </div>
    @endforeach    
        
    </div>
@endsection
