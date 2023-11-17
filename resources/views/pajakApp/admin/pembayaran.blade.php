@extends('layouts.master')

@section('content')
    <!-- Content -->
    {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
    <div class="flex-grow-1 container-p-y container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Pembayaran</span>
        </h4>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center mb-1">Well done :)</h6>
                <p class="mb-0">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center mb-1">Error!</h6>
                <p class="mb-0">{{ session('error') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="row">
                    <div class="head-label col-md-6 text-start">
                        <h5 class="card-title mb-0 pt-2">Data Pembayaran</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New</span></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-datatable table-responsive">
                <table id="example" class="table border-top" style="width:100%">
                    <thead>
                        <tr>
                            <th>Resi Pajak</th>
                            <th>Bulan Lewat Pajak</th>
                            <th>Total Denda</th>
                            <th>Total Pajak Dibayar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        {{-- Modal Create --}}
        <div class="modal fade animate__bounceIn" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Kendaraan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/pembayaran/store') }}" id="create_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Resi Pajak</label>
                                <input type="text" id="resi_pajak" name="resi_pajak" class="form-control" placeholder="Resi Pajak" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Resi Pajak. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Kendaraan</label>
                                {{-- <input type="text" id="id_kendaraan" name="id_kendaraan" class="form-control" placeholder="Kendaraan" required/> --}}
                                <select id="id_kendaraan" name="id_kendaraan" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=""></option>
                                    @foreach ($data['kendaraan'] as $item)
                                        <option value="{{$item->id}}">{{$item->no_polisi}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Kendaraan. </div>
                            </div>
                            <div class="row mt-2" id="kendaraan_detail">
                                <div class="col-sm-6">
                                    {{-- <label class="form-label">Kendaraan</label> --}}
                                    <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" class="form-control" placeholder="Jenis Kendaraan" required/>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="keterangan_kendaraan" name="keterangan_kendaraan" class="form-control" placeholder="Keterangan Kendaraan" required/>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" id="pajak_pertahun" name="pajak_pertahun" class="form-control" placeholder="Pajak Pertahun" required/>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <input type="text" id="pembayar" name="pembayar" class="form-control" placeholder="Pembayar" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Bulan Lewat Pajak</label>
                                <input type="number" id="bulan_lewat_pajak" name="bulan_lewat_pajak" class="form-control" placeholder="Bulan Lewat Pajak" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Bulan Lewat Pajak. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Total Denda</label>
                                <input type="number" id="total_denda" name="total_denda" class="form-control" placeholder="Total Denda" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Total Denda. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Total Pajak Dibayar</label>
                                <input type="number" id="total_pajak_dibayar" name="total_pajak_dibayar" class="form-control" placeholder="Total Pajak Dibayar" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Total Pajak Dibayar. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Pegawai</label>
                                {{-- <input type="text" id="id_pegawai" name="id_pegawai" class="form-control" placeholder="Pegawai" required/> --}}
                                <select id="id_pegawai" name="id_pegawai" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=""></option>
                                    @foreach ($data['pegawai'] as $item)
                                        <option value="{{$item->id}}">{{$item->nrp}} | {{$item->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Pegawai. </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- button for add data -->
                            <button type="button" class="btn btn-primary" id="btn_add">Save</button>
                            <!-- button submit for validation when input type is empty -->
                            <button type="submit" class="btn btn-primary d-none" id="btn_add_2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Create --}}

        {{-- Modal Edit --}}
        <div class="modal fade animate__bounceIn" id="modalEdit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_edit"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form action="{{ url('/pembayaran/update') }}" id="edit_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf --}}
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Resi Pajak</label>
                                <input type="hidden" id="id_edit" name="id" class="form-control" />
                                <input type="text" id="resi_pajak_edit" name="resi_pajak" class="form-control" placeholder="Resi Pajak" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Resi Pajak. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Bulan Lewat Pajak</label>
                                <input type="number" id="bulan_lewat_pajak_edit" name="bulan_lewat_pajak" class="form-control" placeholder="Bulan Lewat Pajak" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Bulan Lewat Pajak. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Total Denda</label>
                                <input type="number" id="total_denda_edit" name="total_denda" class="form-control" placeholder="Total Denda" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Total Denda. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Total Pajak Dibayar</label>
                                <input type="number" id="total_pajak_dibayar_edit" name="total_pajak_dibayar" class="form-control" placeholder="Total Pajak Dibayar" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Total Pajak Dibayar. </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- button for add data -->
                            <button type="button" class="btn btn-primary" id="btn_edit">Edit</button>
                            <!-- button submit for validation when input type is empty -->
                            <button type="submit" class="btn btn-primary d-none" id="btn_edit_2">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Edit --}}

        {{-- Modal Show --}}
        <div class="modal fade animate__bounceIn" id="modalShow" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_show"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <label class="form-label">Resi Pajak</label>
                            <input type="text" id="resi_pajak_show" name="resi_pajak" class="form-control" placeholder="Resi Pajak" required/>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label class="form-label">Bulan Lewat Pajak</label>
                            <input type="number" id="bulan_lewat_pajak_show" name="bulan_lewat_pajak" class="form-control" placeholder="Bulan Lewat Pajak" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Total Denda</label>
                            <input type="number" id="total_denda_show" name="total_denda" class="form-control" placeholder="Total Denda" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Total Pajak Dibayar</label>
                            <input type="number" id="total_pajak_dibayar_show" name="total_pajak_dibayar" class="form-control" placeholder="Total Pajak Dibayar" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal Show --}}

        {{-- <hr class="my-5"> --}}
    </div>

    <!-- / Content -->

    @section('my-script')
        <script>
            // Show table with data
            var table_kendaraan = $('#example').DataTable({
                // dom: '<lf<t>ip>',
                ajax: {
                    url:'{{url("/pembayaran/get-all-pembayaran")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'resi_pajak' },
                    { data: 'bulan_lewat_pajak' },
                    { data: 'total_denda' },
                    { data: 'total_pajak_dibayar' },
                    {
                        data: "id",
                        render: function(data) {
                            return `<td>
                                <a class="btn btn-primary btn-icon rounded-pill text-white btn-edit" data-id="${data}"><i class="fas fa-edit"></i></a>
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item text-black btn-show" data-id="${data}" href="javascript:void(0);">Show</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger btn-delete" data-id="${data}" href="javascript:void(0);">Delete</a></li>
                                    </ul>
                                </div>
                            </td>`
                        }
                    },
                ],
                columnDefs: [
                    { className: 'text-center', targets: [4] },
                ],
            });

            // Empty input type when modal Create hidden
            $('#modalCreate').on('hidden.bs.modal', function (e) {
                $('#resi_pajak').val('');
                $('#bulan_lewat_pajak').val('');
                $('#total_denda').val('');
                $('#total_pajak_dibayar').val('');
                $('#kendaraan_detail').val('');
                $('#id_pegawai').val(null).trigger('change');
                $('#id_kendaraan').val(null).trigger('change');
                $('#btn_add').prop('disabled', false); // button save enable when data input is empty
            });

            // jenis kendaraan onchange at Add Data
            $('#kendaraan_detail').hide();
            $('#id_kendaraan').on('change', function(e){
                e.preventDefault();
                var id = this.value;
                $('#jenis_kendaraan').empty();
                $('#keterangan_kendaraan').empty();
                $('#pajak_pertahun').empty();
                $('#pembayar').empty();
                if (id == '') {
                    $('#kendaraan_detail').hide();
                }else{
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/pembayaran/get-kendaraan') }}",
                        data: {id: id},
                        success: function(data){
                            console.log(data);
                            $('#jenis_kendaraan').val(data.jenis_kendaraan);
                            $('#keterangan_kendaraan').val(data.keterangan_kendaraan);
                            $('#pajak_pertahun').val(data.pajak_pertahun);
                            $('#pembayar').val(data.pembayar);
                        }
                    });
                    $('#kendaraan_detail').show();
                }
            });

            // Add Data
            $('#btn_add').on('click', function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });
                let resi_pajak = $('#resi_pajak').val();
                let bulan_lewat_pajak = $('#bulan_lewat_pajak').val();
                let total_denda = $('#total_denda').val();
                let total_pajak_dibayar = $('#total_pajak_dibayar').val();
                let id_kendaraan = $('#id_kendaraan').val();
                let id_pegawai = $('#id_pegawai').val();
                // alert(resi_pajak+' '+bulan_lewat_pajak+' '+total_denda+' '+total_pajak_dibayar);
                if (!resi_pajak && !bulan_lewat_pajak && !total_denda && !total_pajak_dibayar) {
                    $('#btn_add_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/pembayaran/store') }}",
                        data: {resi_pajak: resi_pajak, bulan_lewat_pajak: bulan_lewat_pajak, total_denda: total_denda, total_pajak_dibayar: total_pajak_dibayar, id_kendaraan: id_kendaraan, id_pegawai: id_pegawai},
                        // dataType: dataType
                        success: function(response){
                            if(response){
                                $('#modalCreate').modal('hide');
                                Swal.fire({
                                    title: 'Good job!',
                                    text: 'Data Saved Successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                });
                            }else{
                                Swal.fire({
                                    title: 'Failed!',
                                    text: 'Data Failed to Save!',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                            table_kendaraan.ajax.reload();
                        }
                    });
                }
            });

            // Show record
            $('#example').on('click', '.btn-show', function (e) {
                e.preventDefault();
                var id = $(this).data("id");

                $('#modalShow').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('/pembayaran/get-pembayaran-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data);
                        $('#title_show').html(data.no_polisi);
                        $('#resi_pajak_show').val(data.resi_pajak);
                        $('#bulan_lewat_pajak_show').val(data.bulan_lewat_pajak);
                        $('#total_denda_show').val(data.total_denda);
                        $('#total_pajak_dibayar_show').val(data.total_pajak_dibayar);
                    }
                });
            });

            // Empty input type when modal Edit hidden
            $('#modalEdit').on('hidden.bs.modal', function (e) {
                $('#btn_edit').prop('disabled', false); // button save enable when data input is empty
            });

            // Edit record
            $('#example').on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var id = $(this).data("id");

                $('#modalEdit').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('/pembayaran/get-pembayaran-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data.id);
                        $('#id_edit').val(data.id);
                        $('#title_edit').html(data.no_polisi);
                        $('#resi_pajak_edit').val(data.resi_pajak);
                        $('#bulan_lewat_pajak_edit').val(data.bulan_lewat_pajak);
                        $('#total_denda_edit').val(data.total_denda);
                        $('#total_pajak_dibayar_edit').val(data.total_pajak_dibayar);
                    }
                });
            });

            $('#btn_edit').on('click', function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });
                var id = $('#id_edit').val();
                let resi_pajak = $('#resi_pajak_edit').val();
                let bulan_lewat_pajak = $('#bulan_lewat_pajak_edit').val();
                let total_denda = $('#total_denda_edit').val();
                let total_pajak_dibayar = $('#total_pajak_dibayar_edit').val();
                let no_polisi = $('#no_polisi_edit').val();
                let pembayar = $('#pembayar_edit').val();

                if (!resi_pajak && !bulan_lewat_pajak && !total_denda && !total_pajak_dibayar) {
                    $('#btn_edit_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/pembayaran/update') }}",
                        data: {id: id, resi_pajak: resi_pajak, bulan_lewat_pajak: bulan_lewat_pajak, total_denda: total_denda, total_pajak_dibayar: total_pajak_dibayar},
                        // dataType: dataType
                        success: function(response){
                            if(response){
                                $('#modalEdit').modal('hide');
                                Swal.fire({
                                    title: 'Good job!',
                                    text: 'Data Updated Successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                });
                            }else{
                                Swal.fire({
                                    title: 'Failed!',
                                    text: 'Data Failed to Update!',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                            table_kendaraan.ajax.reload();
                        }
                    });
                }
            });

            // Delete a record
            $('#example').on('click', '.btn-delete', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });
                var id = $(this).data("id");
                // alert(id);

                // $('#modalDelete').modal('show');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // alert(id);
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/pembayaran/delete') }}",
                            data: {id: id},
                            // dataType: dataType
                            success: function(response){
                                // alert(id);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                table_kendaraan.ajax.reload();
                            }
                        });
                    }
                });
            });
        </script>
    @endsection
@endsection
