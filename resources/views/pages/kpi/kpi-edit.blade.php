@extends('layouts.app')
@section('title')
KPI
@endsection
@section('content')

<div class="page-inner">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb  ">
            <li class="breadcrumb-item " aria-current="page"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-none border">
                <div class="card-header d-flex">
                    <div class="d-flex  align-items-center">
                        <div class="card-title">{{$kpi->title}}</div>
                    </div>

                </div>
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="form-group form-group-default">
                            <label>Department</label>
                            <i class="fa fa-user"></i> {{$kpi->departement->name}}
                        </div>
                        <div class="form-group form-group-default">
                            <label>Posisi</label>
                            <i class="fa fa-user"></i> {{$kpi->designation->name}}
                        </div>
                    </form>
                </div>
            </div>


            <div class="card shadow-none border">
                <div class="card-header d-flex">
                    <div class="d-flex  align-items-center">
                        <div class="card-title">Form Create</div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('kpidetail.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="kpi_id" value="{{$kpi->id}}">
                        <input type="hidden" name="metode" value="cum">
                        <div class="form-group form-group-default">
                            <label>Objective</label>
                            <textarea required name="objective" id="" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group form-group-default">
                            <label>KPI</label>
                            <textarea required name="kpi" id="" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Weight</label>
                            <input required placeholder="0-100" min="1" id="weight" name="weight" type="number" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group form-group-default">
                            <label>Target</label>
                            <input required value="4" id="target" name="target" type="text" class="form-control">
                        </div>
                        <div class="form-group form-group-default">
                            <label>Priode Target</label>
                            <input required placeholder="Daily/Weekly/Monthly" id="priode_target" name="priode_target" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Add</button>

                    </form>
                </div>
                <div class="card-footer">
                    <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni at neque inventore vel.</small>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Table Objective KPI -->
            <div class="card shadow-none border">
                <div class="card-header d-flex">
                    <div class="d-flex  align-items-center">
                        <div class="card-title">Objective KPI</div>
                    </div>
                    <div class="btn-group btn-group-page-header ml-auto">
                        <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu">


                            <a class="dropdown-item" style="text-decoration: none" href="{{route('employee.create')}}">Create</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="text-decoration: none" href="" target="_blank">Print Preview</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display basic-datatables table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Objective</th>
                                    <th>KPI</th>
                                    <th>Weight</th>
                                    <th>Target</th>
                                    <th>Priode Target</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td><a href="{{'data/'. enkripRambo($data->id)}}"> {{$data->objective}} </a></td>
                                    <td>{{$data->kpi}}</td>
                                    <td><b> {{$data->weight}} % </b></td>
                                    <td>{{$data->target}}</td>
                                    <td>{{$data->priode_target}}</td>
                                    <td class="text-right">
                                        {{--<a href="{{route('data.edit', enkripRambo($data->id) )}}">Edit</a>--}}
                                        <a href="#" data-toggle="modal" data-target="#modal-delete-{{$data->id}}">Delete</a>
                                    </td>
                                </tr>
                                <x-modal.delete :id="$data->id" :body="$data->name" url="" />
                                {{--<x-modal.delete :id="$data->id" :body="$data->name" url="{{route('data.delete', enkripRambo($data->id))}}" />--}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row">

                <div class="col-md-6">
                    <!-- Table User  -->
                    <div class="card shadow-none border">
                        <div class="card-header d-flex">
                            <div class="d-flex  align-items-center">
                                <div class="card-title">Employees With This KPI</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display  table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td><a href="{{'data/'. enkripRambo($user->id)}}"> {{$user->biodata->first_name}} </a></td>
                                            <td class="text-right">
                                                {{--<a href="{{route('data.edit', enkripRambo($user->id) )}}">Edit</a>--}}
                                                <a href="#" data-toggle="modal" data-target="#modal-delete-{{$user->id}}">Delete</a>
                                            </td>
                                        </tr>
                                        <x-modal.delete :id="$data->id" :body="$data->name" url="" />
                                        {{--<x-modal.delete :id="$data->id" :body="$data->name" url="{{route('data.delete', enkripRambo($data->id))}}" />--}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Table -->
                </div>
                <!-- Form Assign KPI -->
                <div class="col-md-5">
                    <div class="card shadow-none border">
                        <div class="card-header d-flex">
                            <div class="d-flex  align-items-center">
                                <div class="card-title">Add User To KPI</div>
                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{route('kpidetail.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="kpi_id" value="{{$kpi->id}}">
                                <input type="hidden" name="metode" value="cum">
                                <div class="form-group form-group-default">
                                    <label>Employe</label>
                                    <select class="form-control" name="employe_id">
                                        @foreach ($employes as $employe)
                                        <option value="{{$employe->id}}">{{$employe->biodata->first_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Add</button>

                            </form>
                        </div>
                        <div class="card-footer">
                            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni at neque inventore vel.</small>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection