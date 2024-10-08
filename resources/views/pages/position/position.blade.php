@extends('layouts.app')
@section('title')
Designation
@endsection
@section('content')

<div class="page-inner">
   <nav aria-label="breadcrumb ">
      <ol class="breadcrumb  ">
         <li class="breadcrumb-item " aria-current="page"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
      </ol>
   </nav>

   <div class="row">
      <div class="col-md-4">
         <div class="card shadow-none border">
            <div class="card-header d-flex">
               <div class="d-flex  align-items-center">
                  <div class="card-title">Form Create</div>
               </div>
               {{-- <div class="btn-group btn-group-page-header ml-auto">
                     <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-ellipsis-h"></i>
                     </button>
                     <div class="dropdown-menu">
                        
                        
                        <a  class="dropdown-item" style="text-decoration: none" href="{{route('employee.create')}}">Create</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" style="text-decoration: none" href="" target="_blank">Print Preview</a>
            </div>
         </div> --}}
      </div>
      <div class="card-body">
         <form action="{{route('designation.store')}}" method="POST">
            @csrf
            <div class="form-group form-group-default">
               <label>Name</label>
               <input id="name" name="name" type="text" class="form-control" placeholder="Fill Name">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Add</button>

         </form>
      </div>
      <div class="card-footer">
         <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni at neque inventore vel.</small>
      </div>
   </div>
</div>
<div class="col-md-8">
   <div class="card shadow-none border">
      <div class="card-header d-flex">
         <div class="d-flex  align-items-center">
            <div class="card-title">Jabatan List</div>
         </div>
         <div class="btn-group btn-group-page-header ml-auto">
            <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">


               <a class="dropdown-item" style="text-decoration: none" href="{{route('employee.create')}}">Create</a>
               {{-- <div class="dropdown-divider"></div>            --}}
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" style="text-decoration: none" href="" target="_blank">Print Preview</a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table id="basic-datatables" class="display basic-datatables table table-striped ">
               {{-- id="basic-datatables" class="display table table-striped table-hover" --}}
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Jabatan</th>
                     <th>Level</th>
                     <th>Sub Department</th>
                     <th>Department</th>
                     <th>Bisnis Unit</th>
                     <th class="text-right">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($positions as $position)
                  <tr>
                     <td>{{++$i}}</td>
                     <td>{{$position->name}}</td>
                     <td>{{$position->designation->name}}</td>
                     <td>{{$position->subdept->name}}</td>
                     <td>{{$position->department_name}}</td>
                     <td>{{$position->unit_name}}</td>
                     <td class="text-right">
                        <a href="{{route('designation.edit', enkripRambo($position->id) )}}">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{$position->id}}">Delete</a>
                     </td>
                  </tr>
                  <x-modal.delete :id="$position->id" :body="$position->name" url="{{route('designation.delete', enkripRambo($position->id))}}" />
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
</div>
</div>

@endsection