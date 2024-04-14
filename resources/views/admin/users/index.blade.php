@extends('layout.adminmaster')


@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>




    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body">

                <div style="float: right">
                    <button onclick="location.href='{{ route('users.create') }}'" type="button" class="btn btn-inverse-primary">Add
                        User</button>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="float: right; margin-right: 10px">
                        <button type="button" class="btn btn-inverse-secondary">Export Users</button>
                    </div>
                </form>

                <div style="float: right; margin-inline: 10px">
                    <input class="form-control" type="search" id="myInput" onkeyup="myFunction()"
                        placeholder="Search for anythings.." title="Type in a name" />
                </div>



                <h6 class="card-title">All Users</h6>
                <p class="text-muted mb-3">Here you can see all Users </p>
                <div class="table-responsive">
                    <table id="myInput" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th style="color: goldenrod;">Customer ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($users as $user)
                                
                           
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->usercode }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$user->image) }}" width="60" height="60"
                                        alt="not found" />
                                   <strong> {{ $user->name }}</strong>
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>Admin</td>


                                <th>
                                    
                                    @if($user->status == 1)
                                    <span class="badge bg-success">Active</span></th>
                                    @else
                                    <span class="badge bg-danger">Inactive</span></th>
                                    @endif
                                    
                                <td>

                                    <div class="btn-group">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-icon">
                                            <i data-feather="check-square"></i>
                                        </a>
                                    
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                    
                                            <button type="button"
                                             class="btn btn-danger btn-icon delete-btn" data-user-id="{{ $user->id }}">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>


    // Add event listener for delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure ?',
                text: 'You will not be able to recover this user!',
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



        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
