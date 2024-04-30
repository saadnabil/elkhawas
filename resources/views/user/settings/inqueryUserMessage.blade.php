@extends('layout.usermaster')

@section('content')
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
                <h6 style="color:#a0890e" class="card-title">( {{ $message->admin ? $message->admin->name : 'Unknown User' }})</h6>


                <hr>

                <form action="" method="POST" autocomplete="off">

                    <div class="row">



                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Admin Message </label>
                                <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="6">
                           {{ $message->subject }}
                             
                     </textarea>

                            </div>
                        </div><!-- Col -->



                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Response Message </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">
                              {{ $message->message }}
                              </textarea>

                            </div>
                        </div><!-- Col -->




                    </div><!-- Row -->



                    <button onclick="location.href=''" type="button" class="btn btn-light submit"> Back</button>

                    <button type="submit" class="btn btn-primary submit">Confirm</button>
            </div>
        </div>
    </div>
    </form>
@endsection
