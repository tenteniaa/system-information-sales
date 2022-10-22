@extends('dashboard.sidebar')
@section('konten')
    <div class="container">
           
        <div class="row">
            
            <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="{{ route('supplier.index') }}" role="tab" aria-controls="overview" aria-selected="true">List Supplier</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="{{ route('supplier.create') }}" role="tab" aria-selected="false">Add Supplier</a>
                      </li>
                    </ul>
                    <div>
                      <div class="btn-wrapper">
                        <a class="btn btn-primary"><i class="fas fa-fw fa-user"></i></a>
                      </div>
                    </div>
                  </div>
                  

                <div class="container-fluid">
                        </div>
                       <br/>
                       <section class="content">
                        <div class="box-body pad">
                            
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <section class="col-md-12">
                                    <div class="card">
                                        <div class="box-header">
                                            <h3>
                                                <div class="col-sm-12">
                                                    <br>
                                                    <h3><b class="row justify-content-center">Data Table Supplier</b></h3>
                                                    </br>
                                                </div>
                                                <div style = "float: left">
                                                    <a href="{{ route('exportsupplier') }}" class="btn btn-outline-success"><i class="fa fa-table"></i> Export Excel</a>
                                                </div>

                                                <div class="row justify-content">
                                                    <div class="col-md-5">
                                                        <form action="/supplier">
                                                            <div class="input-group mb-1">
                                                                <input type="text" class="form-control " placeholder="Search" name="search" value="{{request('search')}}">
                                                                <button class="btn btn-secondary" type="submit" ><i class="fas fa-search fa-sm"></i></button>
                                                            </div>
                                                  
                                            </div>
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="example1" class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>No Telepon</th>
                                                        <th>Aksi</th>
                                                    </tr>
    
                                                </thead>
                                                <tbody>
                                                @foreach($supplier as $key => $supplier)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $supplier->supplier_id }}</td>
                                                        <td>{{ $supplier->supplier_name }}</td>
                                                        <td>{{ $supplier->supplier_address }}</td>
                                                        <td>{{ $supplier->supplier_phone  }}</td>
                                                        <td>

                                                            <a href="{{route('supplier.show', $supplier->id)}}" title="show" class="btn btn-primary btn-sm"><i></i>Detail</a>
                                                            @can('suplier-edit')
                                                            <a href="{{route('supplier.edit', $supplier->id)}}" title="edit" class="btn btn-sm btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                            @endcan
                                                            <form method="POST" action="{{route('supplier.destroy', $supplier->id)}}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                @can('suplier-delete')
                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i id="delete" class="fa fa-trash"></i></button>
                                                                @endcan
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection