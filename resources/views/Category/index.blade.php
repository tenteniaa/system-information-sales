@extends('dashboard.sidebar')
@section('konten')

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    {{-- <div class="page-header">
                        <h2 class="header-title">Title</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Breadcrumb 1</a>
                                <span class="breadcrumb-item active">Breadcrumb 2</span>
                            </nav>
                        </div>
                    </div> --}}
                    <!-- Content goes Here -->
                    <div class="page-header no-gutters">
                        <div class="row align-items-md-center">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        {{-- <div class="input-affix m-v-10">
                                            <i class="prefix-icon anticon anticon-search opacity-04"></i>
                                            <input type="text" class="form-control" placeholder="Search Project">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right m-v-10">
                                    {{-- <div class="btn-group m-r-10">
                                        <button id="list-view-btn" type="button" class="btn btn-default btn-icon" data-toggle="tooltip" data-placement="bottom" title="List View">
                                            <i class="anticon anticon-ordered-list"></i>
                                        </button>
                                        <button id="card-view-btn" type="button" class="btn btn-default btn-icon active" data-toggle="tooltip" data-placement="bottom" title="Card View">
                                            <i class="anticon anticon-appstore"></i>
                                        </button>
                                    </div> --}}
                                    <a href="{{ url('/create') }}" class="btn btn-primary float-right">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Data Dosen</h4>
                        <p> Dosen Di Jurusan Ilmu Komputer </p>
                        <div class="m-t-25">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Usia</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th style="width: 10px; text-align: center"><i class='anticon anticon-setting'></i></th>
                                        </tr>

                                        {{-- @foreach ($dosen as $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->usia }}</td>
                                                <td>{{ $item->mata_kuliah }}</td>
                                                <td>{{ $item->sks }}</td>
                                                <td>
                                                    <a href="/dosen/{{ $item->id }}/edit" class="btn btn-warning ">Edit</a>
                                                    <form action="/dosen/{{ $item->id }}" method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="btn btn-danger m-r-5" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
                        <span>
                            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Quick View</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>

@endsection

    {{-- <!-- Core Vendors JS -->
    <script src="{{ url('assets/js/vendors.min.js') }}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>

</body>

</html> --}}