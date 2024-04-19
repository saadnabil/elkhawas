@extends('layout.usermaster')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <div class="t-purple font-bold-700 font-18 my-3">Contact us Info</div>
                        <div class="my-2">
                            <span class="font-14 t-black"><i class="link-icon" data-feather="phone"></i> Ring</span>
                            <span class="font-14 t-black mx-3">

                                @if ($contact)
                                    <span class="font-14 t-black mx-3">{{ $contact->phone }}</span>
                                @else
                                    <span class="font-14 t-black mx-3">No contact information available</span>
                                @endif

                            </span>
                        </div>
                        <div>
                            <span class="font-14 t-black"><i class="link-icon" data-feather="mail"></i> Email</span>
                            <span class="font-14 t-black mx-3">

                                @if ($contact)
                                    <span class="font-14 t-black mx-3">
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
                                @else
                                    <span class="font-14 t-black mx-3">Email Not available</span>
                                @endif

                            </span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="t-purple font-bold-700 font-18 my-3"><strong style="color:#9d8502;"> Company
                                Name</strong></div>
                        <div class="my-2 font-14 t-black">
                            @if ($contact)
                                <span class="font-14 t-black mx-3">{{ $contact->CompanyName }}</span>
                            @else
                                <span class="font-14 t-black mx-3">CompanyName Not available</span>
                            @endif
                        </div>
                        <div class="my-2 font-14 t-black">
                            <div class="t-purple font-bold-700 font-18 my-3"><strong style="color:#9d8502;"> Company
                                    Address</strong></div>

                            @if ($contact)
                                <span class="font-14 t-black mx-3">{{ $contact->address }}</span>
                            @else
                                <span class="font-14 t-black mx-3">address not available</span>
                                @endif
                                 @if ($contact)
                                    <span class="font-14 t-black mx-3">{{ $contact->street }}</span>
                                @else
                                    <span class="font-14 t-black mx-3">street not available</span>
                                @endif
                                @if ($contact)
                                    <span class="font-14 t-black mx-3">{{ $contact->zip }}</span>
                                @else
                                    <span class="font-14 t-black mx-3">zip not available</span>
                                @endif
                        </div>
                        <div class="my-2 font-14 t-black">
                            <div class="t-purple font-bold-700 font-18 my-3"><strong style="color:#9d8502;"> Company
                                    Site</strong></div>

                            @if ($contact)
                                <span class="font-14 t-black mx-3"><a target="_blank"
                                        href="https://elkhawas-gmbh.de/">{{ $contact->UrlLink }}</a></span>
                            @else
                                <span class="font-14 t-black mx-3">UrlLink not available</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="m-0 col-md-8 my-4 my-md-0">
            <div class="d-flex flex-column">
                <div class="row m-1 m-md-0">
                    <form class="m-0 p-0 pr-0">
                        <div class="row justify-content-between container-form pb-3 m-0">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="font-18 font-bold-700 t-purple mb-5">Contact us directly</div>

                                        <div class="d-flex flex-wrap">
                                            <div class="col-12 col-lg-6">
                                                <div class="px-2">
                                                    <div class="mb-3 d-flex flex-column">
                                                        <label class="font-16 form-label font-bold-700">Email
                                                            Address</label>
                                                        <input type="email" class="form-control"
                                                            value="{{ Auth::guard('web')->user()->email }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="px-2">
                                                    <div class="mb-3 d-flex flex-column">
                                                        <label class="font-16 form-label font-bold-700">Enter Subject
                                                            Header</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Subject Header">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="px-2">
                                                    <div class="mb-3 d-flex flex-column">
                                                        <label class="font-16 form-label font-bold-700">Enter Subject /
                                                            Matter</label>
                                                        <textarea class="form-control" style="resize: none;" placeholder="Enter Message"></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end my-4">
                            <button onclick="successIcon()" type="button" class="btn btn-outline-dark">Send
                                Message</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function successIcon() {
            Swal.fire({
                html: '<h3 class="text-success"> Your Message is sent  Successfully</h3>',
                icon: 'success'
            })
        }
    </script>
@endsection
