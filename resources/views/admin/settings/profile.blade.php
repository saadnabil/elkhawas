@extends('admin.layout.index')

@section('content')
<style>
    .account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
}
.account-settings .about {
    margin: 1rem 0 0 0;
    font-size: 0.8rem;
    text-align: center;
}
.card {
    background: white;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.form-control {
    border: 1px solid #eeeeee;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #eeeeee;
    color: #bcd0f7;
}
</style>
 <div class="row">
    <div class="col-5 col-md-3 pe-0">
      <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-profile-tab" data-bs-toggle="tab" href="#v-profile" role="tab" aria-controls="v-profile" aria-selected="true">Profile</a>
        <a class="nav-link" id="v-changepassword-tab" data-bs-toggle="tab" href="#v-changepassword" role="tab" aria-controls="v-changepassword" aria-selected="false">Change Password</a>
      </div>
    </div>
    <div class="col-7 col-md-9 ps-0">
      <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
        <div class="tab-pane fade show active" id="v-profile" role="tabpanel" aria-labelledby="v-profile-tab">
          {{-- <h6 class="mb-1">Profile</h6> --}}
          
       
        
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt=" Admin">
                                    </div>
                                    <h5 class="user-name"> Mohammed Jameel</h5>
                                    <h6 class="user-email">webdiv@gmail.com</h6>
                                </div>
                                <div class="about">
                                    <h5 class="mb-2 text-primary">About</h5>
                                    <h6 class="userinfo">Address : Turkey</h6>
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary">Personal Details</h6>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="Enter  First Name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="LastName">Last Name</label>
                                        <input type="text" class="form-control" id="LastName" placeholder="Enter Last name">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="profileImage">Profile Image</label>
                                        <input type="file" class="form-control" id="profileImage" placeholder="Profile Image">
                                   
                                    </div>
                                    {{-- <br>
                                    <img src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" width="100" height="100" /> --}}

                                </div>
                            </div>

                               <br>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">Street</label>
                                        <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="ciTy">City</label>
                                        <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="sTate">State</label>
                                        <input type="text" class="form-control" id="sTate" placeholder="Enter State">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="zIp">Zip Code</label>
                                        <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        
        
        </div>
        
        <div class="tab-pane fade" id="v-changepassword" role="tabpanel" aria-labelledby="v-changepassword-tab">
          {{-- <h6 class="mb-1">Change Password</h6> --}}
        
          <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Change Password</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="newpassword">New  Password</label>
                                <input type="password" class="form-control" id="newpassword" placeholder="Enter new password">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirom Password">
                            </div>
                        </div>
                        
                    </div>
                  
                        <br>
                       
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        </div>
       
      </div>
    </div>
  </div> 

  
      
@endsection