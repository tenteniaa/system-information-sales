@extends('dashboard.sidebar')
@section('konten')
    <div class="container">
           
        <div class="row">
            
            <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="{{ route('kategori.index') }}" role="tab" aria-controls="overview" aria-selected="true">List Kategori</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="{{ route('kategori.create') }}" role="tab" aria-selected="false">Add Kategori</a>
                      </li>
                    </ul>
                    <div>
                      <div class="btn-wrapper">
                        <a class="btn btn-primary"><i class="fas fa-fw fa-user"></i></a>
                      </div>
                    </div>
                  </div>

                <div class="container-fluid">
                    <div class="col-sm-12">
                        <br>
                        <h2><b class="row justify-content-center">Daftar Kategori</b></h2>
                    </div>
                </div>
                    
                    <!-- Tabel CRUD -->
                    <div class="card-body">
                        
                       <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <section class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div style="float: right">
                                            <a href="#" class="btn btn-success"><i class="fa fa-table"></i> Export</a>
                                            </div>
                                            <form action="/kategori">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{request('search')}}">
                                                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search fa-sm"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($kategori as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nama_kategori }}</td>
                                                        <td>
                                                            
                                                            <a href="{{route('kategori.show', $item->id_kategori)}}" title="show" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                            @can('kategori-edit')
                                                            <a href="{{route('kategori.edit', $item->id_kategori)}}" title="edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                            @endcan
                                                            <form method="POST" action="{{route('kategori.destroy', $item->id_kategori)}}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                @can('kategori-delete')
                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(&quot;Do you confirm to delete?&quot;)"><i id="delete" class="fa fa-trash"></i></button>
                                                                @endcan
                                                            </form>
                                                           
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                            </table>

                                            {{ $kategori->links() }}

                                    </div>
                                </section>
                            </div>
                        </div>
                      </section>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection