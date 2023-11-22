@extends('layouts.master')

@section('content')
    <!-- Content -->
    {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
    <div class="flex-grow-1 container-p-y container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Pegawai</span>
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
                        <h5 class="card-title mb-0 pt-2">Data Pegawai</h5>
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
                                <th>NRP</th>
                                <th>Nama Pegawai</th>
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
                        <h5 class="modal-title">Add Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/pegawai/store') }}" id="create_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">NRP</label>
                                <input type="text" id="nrp" name="nrp" class="form-control" placeholder="NRP" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter NRP. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Nama Pegawai</label>
                                <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Nama Pegawai. </div>
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
                    {{-- <form action="{{ url('/pegawai/update') }}" id="edit_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf --}}
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">NRP</label>
                                <input type="hidden" id="id_edit" name="id" class="form-control" />
                                <input type="text" id="nrp_edit" name="nrp" class="form-control" placeholder="NRP" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter NRP. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Nama Pegawai</label>
                                <input type="text" id="nama_pegawai_edit" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Nama Pegawai. </div>
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
                            <label class="form-label">NRP</label>
                            <input type="text" id="nrp_show" name="nrp" class="form-control" placeholder="NRP" required/>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="text" id="nama_pegawai_show" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required/>
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
            var table_pegawai = $('#example').DataTable({
                // dom: '<lf<t>ip>',
                ajax: {
                    url:'{{url("/pegawai/get-all-pegawai")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'nrp' },
                    { data: 'nama_pegawai' },
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
                    { className: 'text-center', targets: [2] },
                ],
            });

            // Empty input type when modal Create hidden
            $('#modalCreate').on('hidden.bs.modal', function (e) {
                $('#nrp').val('');
                $('#nama_pegawai').val('');
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
                let nrp = $('#nrp').val();
                let nama_pegawai = $('#nama_pegawai').val();

                // alert(nrp+' '+nama_pegawai+' '+pajak_pertahun+' '+denda_telat_perbulan);
                if (!nrp && !nama_pegawai) {
                    $('#btn_add_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/pegawai/store') }}",
                        data: {nrp: nrp, nama_pegawai: nama_pegawai},
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
                            table_pegawai.ajax.reload();
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
                    url: "{{ url('/pegawai/get-pegawai-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data);
                        $('#title_show').html(data.nama_pegawai);
                        $('#nrp_show').val(data.nrp);
                        $('#nama_pegawai_show').val(data.nama_pegawai);
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
                    url: "{{ url('/pegawai/get-pegawai-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data.id);
                        $('#id_edit').val(data.id);
                        $('#title_edit').html(data.nama_pegawai);
                        $('#nrp_edit').val(data.nrp);
                        $('#nama_pegawai_edit').val(data.nama_pegawai);
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
                let nrp = $('#nrp_edit').val();
                let nama_pegawai = $('#nama_pegawai_edit').val();

                if (!nrp && !nama_pegawai) {
                    $('#btn_edit_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/pegawai/update') }}",
                        data: {id: id, nrp: nrp, nama_pegawai: nama_pegawai},
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
                            table_pegawai.ajax.reload();
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
                            url: "{{ url('/pegawai/delete') }}",
                            data: {id: id},
                            // dataType: dataType
                            success: function(response){
                                // alert(id);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                table_pegawai.ajax.reload();
                            }
                        });
                    }
                });
            });
        </script>
    @endsection
@endsection
