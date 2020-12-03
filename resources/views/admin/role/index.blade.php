@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">All Roles</li>
              </ol>
            </nav>
           
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>                                        
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Edit</th>
                                                <th> Delete</th>       
                                            </tr>                                    
                                        </thead>
                                       
                                        <tbody>
                                            @if (count($roles)>0) 
                                            @foreach ($roles as $key=>$role)                                            
                                           <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $role->name }}
                                                </td>
                                                <td>
                                                    {{ $role->description }}
                                                </td>    
                                                <td>
                                                    @if (isset(auth()->user()->role->permission['name']['role']['can-edit']))
                                                    <a class="btn btn-info" href="{{route('roles.edit',[$role->id])}}"><i class="fas fa-edit"></i></a>
                                                    @else <i class="fas fa-edit"></i>
                                                    @endif  
                                                </td>
                                                <td>
                                                    @if (isset(auth()->user()->role->permission['name']['role']['can-delete']))
                                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal{{$role->id}}">
                                                       <i class="fas fa-trash"></i>
                                                    </a>
                                                    @else <i class="fas fa-trash"></i>
                                                    @endif
                                                    <!-- Modal Start -->
                                                       <form action="{{route('roles.destroy',[$role->id])}}" method="POST">
                                                            @csrf
                                                        @method('DELETE')
                                                        <div class="modal fade" id="exampleModal{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                         
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                Are you sure to delete?
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                       
                                                            </div>
                                                        
                                                        </div>
                                                    </form>
                                                  <!------  Modal End ------->
                                                </td>
                                            </tr>
                                            @endforeach 
                                            @else
                                            <td>No department to show</td>
                                            @endif
                                        </tbody>
                                    </table>

        </div>
    </div>
</div>
@endsection

