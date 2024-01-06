@extends('dashboard.sidebar')
@section('konten')           

<div class="col-sm-12">
    <div class="d-flex align-items-center justify-content-between border-bottom">
      <h2><b>Role Management</b></h2>
      <div class="btn-wrapper">
          <a class="btn btn-primary" style="pointer-events: none;"><i class="fas fa-fw fa-users"></i></a>
      </div>
    </div>
        
    <!-- Content -->
    <div class="content mt-4 mb-4">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New Roles</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table no-wrap" id="dataTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{route('roles.show', $role->id)}}" title="show" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                <a href="{{route('roles.edit', $role->id)}}" title="edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $role->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
@foreach ($roles as $key => $role)
<div class="modal fade" id="deleteModal-{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">Yakin ingin menghapus data roles <span style="font-weight: 700">{{ Str::limit($role->name, 30) }}</span>?</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              @can('user-delete') 
              {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $role->id]]) !!}    
              {!! Form::submit('Ya', ['class' => 'btn btn-primary border-0']) !!}
              {!! Form::close() !!}
              @endcan 
          </div>
      </div>
  </div>
</div>
@endforeach

@endsection