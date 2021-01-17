<link rel="stylesheet" href="css/chat.css" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="chat-popup" id="myForm" style="{{(Auth::user()->quyen == 0 ? '' : 'width:800px')}}">
{{--    <div class="container-fluid">--}}
    <div style="display: flex">
    <button type="button" class="btn cancel" style="background-color: #e7ab3c" onclick="closeForm()">Close</button>
    @if(Auth::user()->quyen == 0)
    <button type="button" class="btn cancel" style="background-color: #01880b">Chat with admin</button>
    @endif
    </div>
        <div class="row">

            <div class="col-md-4" style="background-color: white" {{(Auth::user()->quyen == 0 ? 'hidden' : '')}}>
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach ($user as $us)
                            <li class="user" id="{{ $us->id }}">
                                {{--will show unread count
                                notification--}}
                                @if($us->unread)
                                    <span class="pending">{{$us->unread}}</span>
                                @endif
                                <div class="media">
                                    <div class="media-left">
                                        <img src="https://anhnendep.net/wp-content/uploads/2016/04/hinh-avata-chibi-de-thuong-cute-10.jpg" alt="" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{$us->name}}</p>
                                        <p class="email">{{$us->email}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-{{(Auth::user()->quyen == 0 ? '12' : '8')}}" id="messages" style="background-color: white;{{(Auth::user()->quyen == 0 ? 'width:400px' : '')}}">

            </div>
        </div>
{{--    </div>--}}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>

    var our_id = '';
    var my_id = "{{ Auth::id()}}";

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        Pusher.logToConsole = true;

        var pusher = new Pusher('2b0cadfdf83119838af6', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (our_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user').click(function () {
            our_id = $(this).attr('id');
            $(this).find('.pending').remove();
            $.ajax({
                type: "get",
                url: "mess/" + our_id,
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc()
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();
            if (e.keyCode == 13 && message != '' && our_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "our_id=" + our_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "mess",
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
        function scrollToBottomFunc() {
            $('.message-wrapper').animate({
                scrollTop: $('.message-wrapper').get(0).scrollHeight
            }, 5);
        }

    })


</script>

