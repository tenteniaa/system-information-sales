@extends('dashboard.sidebar')

@push('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endpush

@section('konten')           

<div class="col-sm-12">
    <div class="d-flex align-items-center justify-content-between border-bottom">
      <h2><b>Laporan</b></h2>
      <div class="btn-wrapper">
        <a class="btn btn-primary" style="pointer-events: none;"><i class="fas fa-fw fa-file"></i></a>
      </div>
    </div>
        
    <!-- Content -->
    <div class="content mt-4 mb-4">
        <div class="card">
            <div class="card-body d-flex flex-sm-row flex-column">
                <div class="col-md-6 col-sm-12 mb-3 mb-sm-0">
                    <h4>Laporan {{ tanggal_indonesia($tanggalAwal, false) }} s/d {{ tanggal_indonesia($tanggalAkhir, false) }}</h4>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <button onclick="updatePeriode()" class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table no-wrap" id="dataTable">
                        <thead>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Penjualan</th>
                            <th>Pembelian</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@includeIf('laporan.form')
@endsection

@push('scripts')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'penjualan'},
                {data: 'pembelian'},
            ],
            dom: 'Brt',
            bSort: false,
            bPaginate: false,
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });

    function updatePeriode() {
        $('#modal-form').modal('show');
    }
</script>
@endpush