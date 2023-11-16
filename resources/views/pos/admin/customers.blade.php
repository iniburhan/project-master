@extends('layouts.master')

@section('content')
    <!-- Content -->
    {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
    <div class="flex-grow-1 container-p-y container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Customers</span>
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
                        <h5 class="card-title mb-0 pt-2">Data Customers</h5>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th class="text-center">Action</th>
                            {{-- <th></th> --}}
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
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/categories/store') }}" id="create_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Customer Name" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter category name. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Address</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the address. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@example.com" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the email. </div>
                                {{-- <div class="form-text">
                                    You can use letters, numbers & periods
                                </div> --}}
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Phone</label>
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="+62822xxx" maxlength="12" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the phone. </div>
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
                        <h5 class="modal-title" id="title-edit"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form action="{{ url('/categories/update') }}" id="edit_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf --}}
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="hidden" id="id-edit" name="id" class="form-control" />
                                <input type="text" id="name-edit" name="name" class="form-control" placeholder="Customer Name" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter category name. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Address</label>
                                <input type="text" id="address-edit" name="address" class="form-control" placeholder="Address" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the address. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Email</label>
                                <input type="email" id="email-edit" name="email" class="form-control" placeholder="john.doe@example.com" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the email. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Phone</label>
                                <input type="number" id="phone-edit" name="phone" class="form-control" placeholder="+62822xxx" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the phone. </div>
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

        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
        </div>

        {{-- Modal Show --}}
        <div class="modal fade animate__bounceIn" id="modalShow" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title-show"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <label class="form-label">Name</label>
                            <input type="text" id="name-show" name="name" class="form-control" placeholder="Customer Name" readonly/>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label class="form-label">Address</label>
                            <input type="text" id="address-show" name="address" class="form-control" placeholder="Address" readonly/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Email</label>
                            <input type="email" id="email-show" name="email" class="form-control" placeholder="john.doe@example.com" readonly/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Phone</label>
                            <input type="number" id="phone-show" name="phone" class="form-control" placeholder="+62822xxx" readonly/>
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
            var table_customer = $('#example').DataTable({
                // dom: '<lf<t>ip>',
                ajax: {
                    url:'{{url("/customers/get-all-customer")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'address' },
                    { data: 'phone' },
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
                ]
            });

            // Empty input type when modal Create hidden
            $('#modalCreate').on('hidden.bs.modal', function (e) {
                $('#name').val('');
                $('#address').val('');
                $('#email').val('');
                $('#phone').val('');
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
                let name = $('#name').val();
                let address = $('#address').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                // alert(name+' '+address+' '+email+' '+phone);
                if (!name && !address && !email && !phone) {
                    $('#btn_add_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/customers/store') }}",
                        data: {name: name, address: address, email: email, phone: phone},
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
                            table_customer.ajax.reload();
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
                    url: "{{ url('/customers/get-customer-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data);
                        $('#title-show').html(data.name);
                        $('#name-show').val(data.name);
                        $('#address-show').val(data.address);
                        $('#email-show').val(data.email);
                        $('#phone-show').val(data.phone);
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
                    url: "{{ url('/customers/get-customer-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data.id);
                        $('#title-edit').html(data.name);
                        $('#id-edit').val(data.id);
                        $('#name-edit').val(data.name);
                        $('#address-edit').val(data.address);
                        $('#email-edit').val(data.email);
                        $('#phone-edit').val(data.phone);

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
                var id = $('#id-edit').val();
                let name = $('#name-edit').val();
                let address = $('#address-edit').val();
                let email = $('#email-edit').val();
                let phone = $('#phone-edit').val();

                if (!name && !address && !email && !phone) {
                    $('#btn_edit_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/customers/update') }}",
                        data: {id: id, name: name, address: address, email: email, phone: phone},
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
                            table_customer.ajax.reload();
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
                            url: "{{ url('/customers/delete') }}",
                            data: {id: id},
                            // dataType: dataType
                            success: function(response){
                                // alert(id);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                table_customer.ajax.reload();
                            }
                        });
                    }
                });

            });
        </script>
    @endsection
@endsection
