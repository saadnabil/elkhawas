@extends('layout.adminmaster')

@push('style')
<link rel="stylesheet" href="{{ url('assets/css/chat.css') }}">
@endpush

@section('content')
    <div class="col-12">
        <div class="chat-area">
            <!-- chatbox -->
            <div class="chatbox">
                <div class="modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="msg-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <span class="chat-icon"><img class="img-fluid"
                                                src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg"
                                                alt="image title"></span>
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid"
                                                src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h3>{{ $ticket->user->name }}</h3>
                                        </div>
                                        @can('ticket-close')
                                            <a  title="{{ __('translation.Close this ticket') }}" href="{{ route('tickets.close', $ticket->id) }}"
                                                class=" btn btn-danger btn-icon">
                                                <i class="fas fa-lock"></i>
                                            </a>
                                        @endcan
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="msg-body">
                                <ul id="chat-area" style="height:50vh; auto;overflow-y:scroll;overflow-x:hidden;padding:20px;">
                                    @foreach ($ticket->messages as $message)
                                        @if ($message->sender_id == auth()->id() && $message->sender_type == 'App\Models\Admin')
                                            <li class="repaly">
                                                <p>{{ $message->content }}</p>
                                                <span class="time">{{ $message->created_at->format('h:i a') }}</span>
                                            </li>
                                        @else
                                            <li class="sender">
                                                <p>{{ $message->content }}</p>
                                                <span class="time">{{ $message->created_at->format('h:i a') }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="send-box">
                            <form autocomplete="off" action="{{ route('dashboard.support.sendMessage',$ticket->id) }}" enctype="multipart/form-data">
                                <input required id="message" name="content" type="text" class="form-control" aria-label="message…"
                                    placeholder="Write message…">
                                <button id="send" data-route="{{ route('dashboard.support.sendMessage', $ticket->id) }}" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>Send</button>
                            </form>
                            <div class="send-btns">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chatbox -->


    </div>

    <!-- char-area -->
    @push('script')
        <script>
            $('#chat-area').scrollTop($('#chat-area')[0].scrollHeight);
        </script>
        <script>
            $(document).ready(function() {
                $(".chat-list a").click(function() {
                    $(".chatbox").addClass('showbox');
                    return false;
                });

                $(".chat-icon").click(function() {
                    $(".chatbox").removeClass('showbox');
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#send').click(function(e){
                    e.preventDefault();
                    let route = $(this).data('route');
                    let message = $('#message').val();
                    $.post(route,
                        {
                            'content' : message,
                        },
                        function(data,status){
                            let senderMessage = `<li class="repaly">
                                <p>${message}</p>
                                <span class="time">Now</span>
                            <li>`;
                            $('#chat-area').append(senderMessage);
                            $('#message').val('');
                            $('#chat-area').scrollTop($('#chat-area')[0].scrollHeight);
                        }
                    );
                });
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;
                var pusher = new Pusher('760480af1169b2a7b3bd', {
                    cluster: 'eu'
                  });
                  var channel = pusher.subscribe('chat{{ auth()->user()->slug }}{{ $ticket != null ? $ticket->id : '' }}');
                  channel.bind('chatMessage', function(data) {
                    let message = data.message;
                    let recieverMessage = `<li class="sender">
                        <p>${message}</p>
                        <span class="time">Now</span>
                    </li>`;
                    $('#chat-area').append(recieverMessage);
                    $("#chat-area").animate({ scrollTop: $('#chat-area').prop("scrollHeight")}, 1000);
                  });
            });

        </script>
    @endpush
@endsection
