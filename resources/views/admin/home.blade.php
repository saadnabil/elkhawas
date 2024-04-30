@extends('layout.adminmaster')


@section('content')
    <div class="row">
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i data-feather="user"></i>
                       {{ __('translation.Total Users') }}
                    </h4>
                    <br>
                    <strong style="color: green">
                        {{ $totalUser }} {{ __('translation.user') }}</strong>

                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i data-feather="user"></i>
                       {{ __('translation.Total Admins') }}
                    </h4>
                    <br>
                    <strong style="color: green">{{ $totalAdmin }} {{ __('translation.admin') }}</strong>




                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">

                    <h4>
                        <i data-feather="shopping-bag"></i>
                        {{ __('translation.Total Orders') }}
                    </h4>
                    <br>
                    <strong style="color: orange">{{ $totalOrder }} {{ __('translation.Orders') }}</strong>




                </div>
            </div>
        </div>




        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">

                    <h4>
                        <i data-feather="dollar-sign"></i>

                       {{ __('translation.Total Money') }}
                    </h4>
                    <br>
                    <strong style="color: goldenrod">${{ number_format($totalRenvue,2)  }}</strong>




                </div>
            </div>
        </div>


        

        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4> <i data-feather="dollar-sign"></i>
                      {{ __('translation.Revenue this mounth') }}</h4>
                    <br>
                    <strong style="color: goldenrod"> ${{ number_format($renvueThisMount,2)  }}</strong>


                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4> <i data-feather="dollar-sign"></i>
                     {{ __('translation.Revenue last mounth') }}</h4>
                    <br>
                    <strong style="color: goldenrod"> $ {{ $renvueLastMount }}</strong>


                </div>
            </div>
        </div>


         <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4> <i data-feather="dollar-sign"></i>
                        {{ __('translation. Revenue Last 30 days') }}</h4>
                    <br>
                    <strong style="color: goldenrod"> ${{ number_format($renvueLastThirtyDays,2)  }}</strong>


                </div>
            </div>
        </div>



    </div>
    

    <br>
    <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
                <h6 class="card-title mb-0">{{ __('translation.ADMIN|EMPLOYEE|CUSTOMER') }}</h6>

               <div style="float: right; ">
              <input class="form-control" type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for anythings.." title="Type in a name" />
            </div>

            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="myInput">
                    <thead  >
                        <tr >
                            <th  class="pt-0">#</th>
                            <th class="pt-0">{{ __('translation.NAME') }}</th>
                            <th class="pt-0">{{ __('translation.EMAIL') }}</th>
                            <th class="pt-0"> {{ __('translation.PHONE NUMBER') }}</th>
                            <th class="pt-0">{{ __('translation.ROLES') }}</th>
                            <th class="pt-0">{{ __('translation.STATUS') }}</th>
                            <th class="pt-0">{{ __('translation.CREATED AT') }}</th>
                        </tr>
                    </thead>
                    <tbody id="myTable" >
                        <tr>
                            <td>1</td>
                            <td>Mohammed ali</td>
                            <td>mohammed@gmail.com</td>
                            <td>05990942210</td>
                            <td>{{ __('translation.admin') }}</td>
                            <td><span class="badge bg-success">{{ __('translation.active') }}</span></td>
                            <td>01/01/2023</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ahmed ali</td>
                            <td>ahmed@gmail.com</td>
                            <td>05990942210</td>
                            <td>{{ __('translation.Employee') }}</td>
                            <td><span class="badge bg-danger">{{ __('translation.inactive') }}</span></td>
                            <td>01/01/2023</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ahmed ali</td>
                            <td>ahmed@gmail.com</td>
                            <td>05990942210</td>
                            <td>{{ __('translation.user') }}</td>
                            <td><span class="badge bg-success">{{ __('translation.active') }}</span></td>
                            <td>01/01/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script>
 $(document).ready(function(){
   $("#myInput").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
   });
 });
 </script>

@endsection
