@extends('layouts.master')

@section('content')
    <!-- Content -->
    {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
    <div class="flex-grow-1 container-p-y container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Kendaraan</span>
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
                        <h5 class="card-title mb-0 pt-2">Data Kendaraan</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New</span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-datatable table-responsive">
                    <table id="example" class="table border-top" style="width:100%">
                        <thead>
                            <tr>
                                <th>Jenis Kendaraan</th>
                                <th>Keterangan Kendaraan</th>
                                <th>Pajak Pertahun</th>
                                <th>Denda Perbulan</th>
                                <th>Nomor Polisi</th>
                                <th>Pembayar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
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
                    <form action="{{ url('/kendaraan/store') }}" id="create_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Jenis Kendaraan</label>
                                <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" class="form-control" placeholder="Jenis Kendaraan" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter jenis kendaraan. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Keterangan Kendaraan</label>
                                <input type="text" id="keterangan_kendaraan" name="keterangan_kendaraan" class="form-control" placeholder="Keterangan Kendaraan" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the keterangan kendaraan. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Pajak Pertahun</label>
                                <input type="number" id="pajak_pertahun" name="pajak_pertahun" class="form-control" placeholder="Pajak Pertahun" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the pajak pertahun. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Denda Perbulan</label>
                                <input type="number" id="denda_telat_perbulan" name="denda_telat_perbulan" class="form-control" placeholder="Denda Perbulan" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the denda perbulan. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" id="no_polisi" name="no_polisi" class="form-control" placeholder="Nomor Polisi" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the nomor polisi. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Pembayar</label>
                                <input type="text" id="pembayar" name="pembayar" class="form-control" placeholder="Pembayar" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the pembayar. </div>
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
                    {{-- <form action="{{ url('/kendaraan/update') }}" id="edit_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf --}}
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Jenis Kendaraan</label>
                                <input type="hidden" id="id_edit" name="id" class="form-control" />
                                <input type="text" id="jenis_kendaraan_edit" name="jenis_kendaraan" class="form-control" placeholder="Jenis Kendaraan" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter jenis kendaraan. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Keterangan Kendaraan</label>
                                <input type="text" id="keterangan_kendaraan_edit" name="keterangan_kendaraan" class="form-control" placeholder="Keterangan Kendaraan" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the keterangan kendaraan. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Pajak Pertahun</label>
                                <input type="number" id="pajak_pertahun_edit" name="pajak_pertahun" class="form-control" placeholder="Pajak Pertahun" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the pajak pertahun. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Denda Perbulan</label>
                                <input type="number" id="denda_telat_perbulan_edit" name="denda_telat_perbulan" class="form-control" placeholder="Denda Perbulan" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the denda perbulan. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" id="no_polisi_edit" name="no_polisi" class="form-control" placeholder="Nomor Polisi" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the nomor polisi. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Pembayar</label>
                                <input type="text" id="pembayar_edit" name="pembayar" class="form-control" placeholder="Pembayar" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the pembayar. </div>
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
                            <label class="form-label">Jenis Kendaraan</label>
                            <input type="text" id="jenis_kendaraan_show" name="jenis_kendaraan" class="form-control" placeholder="Jenis Kendaraan" required/>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label class="form-label">Keterangan Kendaraan</label>
                            <input type="text" id="keterangan_kendaraan_show" name="keterangan_kendaraan" class="form-control" placeholder="Keterangan Kendaraan" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Pajak Pertahun</label>
                            <input type="number" id="pajak_pertahun_show" name="pajak_pertahun" class="form-control" placeholder="Pajak Pertahun" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Denda Perbulan</label>
                            <input type="number" id="denda_telat_perbulan_show" name="denda_telat_perbulan" class="form-control" placeholder="Denda Perbulan" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Nomor Polisi</label>
                            <input type="text" id="no_polisi_show" name="no_polisi" class="form-control" placeholder="Nomor Polisi" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Pembayar</label>
                            <input type="text" id="pembayar_show" name="pembayar" class="form-control" placeholder="Pembayar" required/>
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
                    url:'{{url("/kendaraan/get-all-kendaraan")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'jenis_kendaraan' },
                    { data: 'keterangan_kendaraan' },
                    { data: 'pajak_pertahun' },
                    { data: 'denda_telat_perbulan' },
                    { data: 'no_polisi' },
                    { data: 'pembayar' },
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
                    { className: 'text-center', targets: [6] },
                ],
            });

            // Empty input type when modal Create hidden
            $('#modalCreate').on('hidden.bs.modal', function (e) {
                $('#jenis_kendaraan').val('');
                $('#keterangan_kendaraan').val('');
                $('#pajak_pertahun').val('');
                $('#denda_telat_perbulan').val('');
                $('#no_polisi').val('');
                $('#pembayar').val('');
                $('#btn_add').prop('disabled', false); // button save enable when data input is empty
            });

            // Add Data
            $('#btn_add').on('click', function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });
                let jenis_kendaraan = $('#jenis_kendaraan').val();
                let keterangan_kendaraan = $('#keterangan_kendaraan').val();
                let pajak_pertahun = $('#pajak_pertahun').val();
                let denda_telat_perbulan = $('#denda_telat_perbulan').val();
                let no_polisi = $('#no_polisi').val();
                let pembayar = $('#pembayar').val();

                // alert(jenis_kendaraan+' '+keterangan_kendaraan+' '+pajak_pertahun+' '+denda_telat_perbulan);
                if (!jenis_kendaraan && !keterangan_kendaraan && !pajak_pertahun && !denda_telat_perbulan && !no_polisi && !pembayar) {
                    $('#btn_add_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/kendaraan/store') }}",
                        data: {jenis_kendaraan: jenis_kendaraan, keterangan_kendaraan: keterangan_kendaraan, pajak_pertahun: pajak_pertahun, denda_telat_perbulan: denda_telat_perbulan, no_polisi: no_polisi, pembayar:pembayar},
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
                    url: "{{ url('/kendaraan/get-kendaraan-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data);
                        $('#title_show').html(data.no_polisi);
                        $('#jenis_kendaraan_show').val(data.jenis_kendaraan);
                        $('#keterangan_kendaraan_show').val(data.keterangan_kendaraan);
                        $('#pajak_pertahun_show').val(data.pajak_pertahun);
                        $('#denda_telat_perbulan_show').val(data.denda_telat_perbulan);
                        $('#no_polisi_show').val(data.no_polisi);
                        $('#pembayar_show').val(data.pembayar);
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
                    url: "{{ url('/kendaraan/get-kendaraan-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data.id);
                        $('#id_edit').val(data.id);
                        $('#title_edit').html(data.no_polisi);
                        $('#jenis_kendaraan_edit').val(data.jenis_kendaraan);
                        $('#keterangan_kendaraan_edit').val(data.keterangan_kendaraan);
                        $('#pajak_pertahun_edit').val(data.pajak_pertahun);
                        $('#denda_telat_perbulan_edit').val(data.denda_telat_perbulan);
                        $('#no_polisi_edit').val(data.no_polisi);
                        $('#pembayar_edit').val(data.pembayar);
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
                let jenis_kendaraan = $('#jenis_kendaraan_edit').val();
                let keterangan_kendaraan = $('#keterangan_kendaraan_edit').val();
                let pajak_pertahun = $('#pajak_pertahun_edit').val();
                let denda_telat_perbulan = $('#denda_telat_perbulan_edit').val();
                let no_polisi = $('#no_polisi_edit').val();
                let pembayar = $('#pembayar_edit').val();

                if (!jenis_kendaraan && !keterangan_kendaraan && !pajak_pertahun && !denda_telat_perbulan && !no_polisi && !pembayar) {
                    $('#btn_edit_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/kendaraan/update') }}",
                        data: {id: id, jenis_kendaraan: jenis_kendaraan, keterangan_kendaraan: keterangan_kendaraan, pajak_pertahun: pajak_pertahun, denda_telat_perbulan: denda_telat_perbulan, no_polisi: no_polisi, pembayar: pembayar},
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
                            url: "{{ url('/kendaraan/delete') }}",
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
