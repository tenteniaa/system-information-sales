@extends('dashboard.sidebar')
@section('konten')

<div class="card">
  <b class="card-header">Edit Supplier</b>
  <div class="card-body">
      
      <form action="{{ url('supplier/' .$supplier->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$supplier->id}}" id="id" />
        <label>ID</label></br>
        <input type="text" name="supplier_id" disabled="disabled" id="supplier_id" value="{{$supplier->supplier_id}}" class="form-control"></br>
        <label>Nama</label></br>
        <input type="text" name="supplier_name" id="supplier_name" value="{{$supplier->supplier_name}}" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="supplier_address" id="supplier_address" value="{{$supplier->supplier_address}}" class="form-control"></br>
        <label>No Telepon</label></br>
        <input type="text" name="supplier_phone" id="supplier_phone" value="{{$supplier->supplier_phone}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop