@extends('layouts.master')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
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
                            <th></th>
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

        <hr class="my-5">
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
                                        <li><a class="dropdown-item text-black btn-show" data-id="${data}">Show</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item btn-label-danger text-black btn-delete" data-id="${data}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>`
                        }
                    },
                ]
            });

            // Empty input type when modal hidden
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
                var values = $(this).data("id");
                alert(values);

                // $.ajax({
                //     type: "GET",
                //     url: "{{ url('/customers/store') }}",
                //     data: {name: name, address: address, email: email, phone: phone},
                //     // dataType: dataType
                //     success: function(response){
                //         if(response){
                //             $('#modalCreate').modal('hide');
                //             Swal.fire({
                //                 title: 'Good job!',
                //                 text: 'Data Saved Successfully!',
                //                 icon: 'success',
                //                 confirmButtonText: 'OK',
                //             });
                //         }else{
                //             Swal.fire({
                //                 title: 'Failed!',
                //                 text: 'Data Failed to Save!',
                //                 icon: 'error',
                //                 confirmButtonText: 'OK'
                //             });
                //         }
                //         table_customer.ajax.reload();
                //     }
                // });
            });

            // Edit record
            $('#example').on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var values = $(this).data("id");
                alert(values);

                // editor.edit($(this).closest('tr'), {
                //     title: 'Edit record',
                //     buttons: 'Update'
                // });
            });

            // Delete a record
            $('#example').on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var values = $(this).data("id");
                alert(values);

                // editor.remove($(this).closest('tr'), {
                //     title: 'Delete record',
                //     message: 'Are you sure you wish to remove this record?',
                //     buttons: 'Delete'
                // });
            });
        </script>
    @endsection
@endsection
