@extends('layout.adminmaster')

@section('content')
    <div class="row">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-body">

                    <h6 style="color:#a0890e" class="">
                        <strong style="color:red"> ( {{ $message->user ? $message->user->name : 'Unknown User' }})
                        </strong>Request Message
                    </h6>



                    <hr>

                    <form action="" method="POST" autocomplete="off">

                        <div class="row">


                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Client Subject Message</label>
                                    <input disabled class="form-control" id="exampleFormControlTextarea1"
                                        value="{{ $message->subject }}">
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Client Message</label>
                                    <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="6">
            {{ $message->message }}
        </textarea>
                                </div>
                            </div><!-- Col -->




                        </div><!-- Row -->
                        <a href="{{ route('admin.dashboard.index') }}" type="submit" class="btn btn-light submit"> Back</a>



                </div>
            </div>
        </div>
        </form>









        <div class="col-md-6 ">
            <div class="card">
                <div class="card-body">

                    <h6 style="color:#a0890e">
                        Make Response Message to client
                    </h6>



                    <hr>

                    <form action="{{ route('admin.RepleyMessageToUser', $message->id) }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="row">


                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label"> Subject Message</label>
                                    <input name="subject" class="form-control" id="exampleFormControlTextarea1"
                                        placeholder="Subject Message">
                                </div>
                            </div><!-- Col -->
                            <!-- Hidden User ID -->
                            <input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">



                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label"> Message</label>
                                    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="6">
           
                            </textarea>
                                </div>
                            </div><!-- Col -->




                        </div><!-- Row -->




                        <button type="submit" class="btn btn-primary submit">Confirm Respone</button>
                </div>
            </div>
        </div>
        </form>


    </div>
@endsection
