@extends('layouts.layout')
@section('content')  
    <div class="content-title d-flex justify-content-between">
        <h4>Top Categories(User Based)</h4>
    </div>

    <div class="row">
      
@foreach($data['categoriesU'] as $category)
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
        
    </div>
@endsection