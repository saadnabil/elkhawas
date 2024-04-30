@extends('layout.usermaster')

@section('content')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Change Password</h6>

                <form id="changePasswordForm" action="{{ route('user.UserChangePassword') }}" enctype="multipart/form-data"  method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" placeholder="new password" name="new_password" class="form-control" required>
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" placeholder="confirm password" name="confirm_password" class="form-control" required>
                        @error('confirm_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>

  



                    <button type="button" id="changePasswordBtn" class="btn btn-primary">Change Password</button>
                </form>

                <script>
                    document.getElementById('changePasswordBtn').addEventListener('click', function() {
                        // Show SweetAlert confirmation
                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'Are you sure you want to change your password?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, change it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If confirmed, submit the form
                                document.getElementById('changePasswordForm').submit();
                            }
                        });
                    });
                </script>



            </div>
        </div>
    </div>
@endsection
