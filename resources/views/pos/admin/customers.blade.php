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
                        {{-- <div class="text-right"> --}}
                            {{-- <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
                            </button> --}}
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New</span></span>
                            </button> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table id="example" class="table border-top" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" /> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#example').DataTable({
            dom: '<lf<t>ip>',
            ajax: {
                url:'{{url("/customers/get-all-customer")}}',
                dataSrc: ''
            },
            columns: [
                { data: 'name' },
                { data: 'description' }
            ]
        });
    </script>

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" />
    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.bootstrap5.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="{{asset('template/sneat/assets/js/dataTables.editor.min.js')}}"></script>
    <script src="{{asset('template/sneat/assets/js/editor.bootstrap5.min.js')}}"></script> --}}
    {{-- <script>
        var editor = new DataTable.Editor({
            ajax: '../php/staff.php',
            // dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            bootstrap: {
                floatingLabels: true
            },
            fields: [
                {
                    label: 'First name:',
                    name: 'first_name'
                },
                {
                    label: 'Last name:',
                    name: 'last_name'
                },
                {
                    label: 'Position:',
                    name: 'position'
                },
                {
                    label: 'Office:',
                    name: 'office'
                },
                {
                    label: 'Extension:',
                    name: 'extn'
                },
                {
                    label: 'Start date:',
                    name: 'start_date',
                    type: 'datetime'
                },
                {
                    label: 'Salary:',
                    name: 'salary'
                }
            ],
            table: '#example'
        });

        var table = $('#example').DataTable({
            ajax: '../php/staff.php',
            columns: [
                {
                    data: null,
                    render: function (data, type, row) {
                        // Combine the first and last names into a single table field
                        return data.first_name + ' ' + data.last_name;
                    }
                },
                { data: 'position' },
                { data: 'office' },
                { data: 'extn' },
                { data: 'start_date' },
                { data: 'salary', render: DataTable.render.number(null, null, 0, '$') }
            ],
            lengthChange: false,
            select: true
        });

        // Display the buttons
        new DataTable.Buttons(table, [
            { extend: 'create', editor: editor },
            { extend: 'edit', editor: editor },
            { extend: 'remove', editor: editor }
        ]);

        table.buttons().container().appendTo($('.col-md-6:eq(0)', table.table().container()));
    </script> --}}

    {{-- Sweetalert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script>
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
    </script> --}}
@endsection
