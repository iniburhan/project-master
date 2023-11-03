@extends('layouts.master')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Category</span>
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

        <!-- DataTable with Buttons -->
        {{-- <div class="card">
            <div class="card-datatable table-responsive">
              <table class="datatables-basic table border-top">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div> --}}
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="row">
                    <div class="head-label col-md-6 text-start">
                        <h5 class="card-title mb-0 pt-2">Data Categories</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        {{-- <div class="text-right"> --}}
                            {{-- <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
                            </button> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New</span></span>
                            </button>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="example" class="table border-top" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center" style="max-width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['categories'] as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td class="text-center">
                                    <form action="{{url('/categories/delete')}}/{{$item->id}}" id="delete_data_form{{$item->id}}" method="POST" style="text-align:center">
                                        {{-- <input type="text" name="id" value = "{{$item->id}}"> --}}
                                        <button type="button" class="btn icon btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalShow{{$item->id}}"><i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn icon btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        @csrf
                                        {{-- <button type="button" title="delete" id="delete_data" class="btn icon btn-danger"data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{$item->id}}"><i class="fa-solid fa-trash"></i>
                                        </button> --}}
                                        <button type="button" title="delete" onclick="deleteFunction({{$item->id}})" class="btn icon btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
                                <input type="text" id="name" name="name" class="form-control" placeholder="Category Name" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter category name. </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Description</label>
                                <input type="text" id="description" name="description" class="form-control" placeholder="Description" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the description. </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <label class="form-label" for="basicEmail">Email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                                        placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                </div>
                                <div class="form-text">
                                    You can use letters, numbers & periods
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="basicDate">Joining Date</label>
                                <div class="input-group input-group-merge">
                                    <span id="basicDate2" class="input-group-text"><i class='bx bx-calendar'></i></span>
                                    <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                                        aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label" for="basicSalary">Salary</label>
                                <div class="input-group input-group-merge">
                                    <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
                                    <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                                        placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Create --}}

        @foreach ($data['categories'] as $value)
            {{-- Modal Show --}}
            <div class="modal fade animate__bounceIn" id="modalShow{{$value->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$value->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="hidden" name="id" value="{{$value->id}}">
                                <input type="text" id="name" name="name" value="{{$value->name}}" class="form-control" placeholder="Category Name" required/>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label class="form-label">Description</label>
                                <input type="text" id="description" value="{{$value->description}}" name="description" class="form-control" placeholder="Description" required/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="submit" class="btn btn-primary" id="btn-success">Save</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Modal Show --}}

            {{-- Modal Edit --}}
            <div class="modal fade animate__bounceIn" id="modalEdit{{$value->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$value->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('/categories/update') }}" id="edit_data" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <label class="form-label">Name</label>
                                    <input type="hidden" name="id" value="{{$value->id}}">
                                    <input type="text" id="name" name="name" value="{{$value->name}}" class="form-control" placeholder="Category Name" required/>
                                    {{-- <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter category name. </div> --}}
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <label class="form-label">Description</label>
                                    <input type="text" id="description" name="description" value="{{$value->description}}" class="form-control" placeholder="Description" required/>
                                    {{-- <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter the description. </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Modal Edit --}}
        @endforeach


        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                        <label class="form-label" for="basicFullname">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" id="basicFullname" class="form-control dt-full-name"
                                name="basicFullname" placeholder="John Doe" aria-label="John Doe"
                                aria-describedby="basicFullname2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPost">Post</label>
                        <div class="input-group input-group-merge">
                            <span id="basicPost2" class="input-group-text"><i class='bx bxs-briefcase'></i></span>
                            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                                placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicEmail">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                        </div>
                        <div class="form-text">
                            You can use letters, numbers & periods
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicDate">Joining Date</label>
                        <div class="input-group input-group-merge">
                            <span id="basicDate2" class="input-group-text"><i class='bx bx-calendar'></i></span>
                            <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                                aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicSalary">Salary</label>
                        <div class="input-group input-group-merge">
                            <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
                            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                                placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!--/ DataTable with Buttons -->

        <hr class="my-5">
    </div>
    <!-- / Content -->

    {{-- Datatable --}}
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
    <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{asset('template/sneat/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}">
    <!-- Vendors JS -->
    {{-- <script src="{{asset('template/sneat/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script> --}}
    <!-- Page JS -->
    {{-- <script src="{{asset('template/sneat/assets/js/tables-datatables-basic.js')}}"></script>
    <script src="{{asset('template/sneat/assets/js/tables-datatables-advanced.js')}}"></script> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script> --}}

    <script>
        $('#example').DataTable();
    </script>

    {{-- Sweetalert --}}
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script> --}}
    <script>
        // sweetalert create
        $('#create_data').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ url('/categories/store') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    if (data.status = true) {
                        $('#modalCreate').modal('hide');
                        Swal.fire({
                            title: 'Good job!',
                            text: 'Data Saved Successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK',
                        })
                        .then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Failed!',
                            text: 'Data Failed to Save!',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
            });
        });

        // sweetalert edit
        $('#edit_data').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ url('/categories/update') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    if (data.status = true) {
                        $('#modalEdit').modal('hide');
                        Swal.fire({
                            title: 'Good job!',
                            text: 'Data Updated Successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                        .then((result) => {
                            location.reload();
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            title: 'Failed!',
                            text: 'Data Failed to Update!',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
            });
        });

        // sweetalert create
        function deleteFunction(id) {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            })
            .then(function(inputvalue){
                if(inputvalue.isConfirmed) {
                    $('#delete_data_form'+id).submit(); // submitting the form when user press yes
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                }else{
                    Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        };
    </script>
@endsection
