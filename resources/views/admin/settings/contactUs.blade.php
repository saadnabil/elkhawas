@extends('layout.adminmaster')

@section('content')




    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Contact us Settings</h6>
                @if ($errors->any())
                    <div>
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

               <form class="forms-sample" action="{{ route('ContactUs.update') }}" method="POST">

                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputUsername1"
                                    value="{{ $contact->phone }}" autocomplete="off" placeholder="Phone">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    value="{{ $contact->email }}" placeholder="Email">
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Company Name</label>
                                <input type="text" name="CompanyName" class="form-control" id="exampleInputUsername1"
                                    value="{{ $contact->CompanyName }}" autocomplete="off" placeholder="Company Name">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputUsername1"
                                    value="{{ $contact->address }}" autocomplete="off" placeholder="Address">
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Street</label>
                                <input type="text" name="street" class="form-control" id="exampleInputUsername1"
                                    value="{{ $contact->street }}" autocomplete="off" placeholder="Street">
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Zip Code</label>
                                <input type="text" name="zip" class="form-control" id="exampleInputUsername1"
                                    value="{{ $contact->zip }}" autocomplete="off" placeholder="Zip Code">
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Url Link</label>
                                <input type="text" name="UrlLink" class="form-control" id="exampleInputUsername1"
                                    value="{{ $contact->UrlLink }}" autocomplete="off" placeholder="Url Link">
                            </div>
                        </div>





                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        </form>
    </div>


    <br>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">




                <h6 class="card-title">Contact us info </h6>
                <p class="text-muted mb-3">Contact us Settings Table </p>



                <div class="table-responsive">
                    <table id="myInput" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Info</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">



                            @foreach ($data as $show)
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $show->phone }}</td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td>{{ $show->email }}</td>
                                </tr>


                                <tr>
                                    <td>Company Name</td>
                                    <td>{{ $show->CompanyName }}</td>
                                </tr>


                                <tr>
                                    <td>Address</td>
                                    <td>{{ $show->address }}</td>
                                </tr>


                                <tr>
                                    <td>Street</td>
                                    <td>{{ $show->street }}</td>
                                </tr>


                                <tr>
                                    <td>Zip</td>
                                    <td>{{ $show->zip }}</td>
                                </tr>


                                <tr>
                                    <td>UrlLink</td>
                                    <td>{{ $show->UrlLink }}</td>
                                </tr>


                </div>
                </td>

                <div style="">
                    <form id="delete-form-{{ $show->id }}" action="{{ route('ContactUs.destroy', $show->id) }}"
                        method="POST">
                        @method('DELETE')
                        @csrf

                        {{-- <button type="button" class="btn btn-danger btn-icon delete-btn"
                            data-user-id="{{ $show->id }}">
                            <i data-feather="trash-2"></i>
                        </button> --}}
                    </form>
                </div>
                @endforeach


                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script>
        // Add event listener for delete button click
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');

                // Show SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure ?',
                    text: 'You will not be able to recover this !',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the form
                        document.getElementById('delete-form-' + userId).submit();
                    }
                });
            });
        });
    </script>

@endsection
