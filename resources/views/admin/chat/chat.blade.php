@include('admin.layouts.header', ['title' => 'Chat'])

@include('admin.layouts.menu')
<style>
    .hide {
        display: none;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="d-lg-flex">
                <div class="chat-leftsidebar card" style="min-width: 100%">
                    <div class="p-3 px-4 border-bottom">
                        <div class="d-flex align-items-start ">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <img src="{{asset('upload/'.auth()->user()->getProfile()->image)}}" class="avatar-sm rounded-circle"
                                    alt="">
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{auth()->user()->name}} <i
                                            class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a>
                                </h5>
                                <p class="text-muted mb-0">Available</p>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown chat-noti-dropdown">
                                    <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{route('auth.profile')}}">Profile</a>
                                        <a class="dropdown-item" href="{{route('auth.profile-edit')}}">Edit</a>
                                        <a class="dropdown-item" href="#">Add Contact</a>
                                        <a class="dropdown-item" href="#">Setting</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3">
                        <div class="search-box position-relative">
                            <input type="text" class="form-control rounded border" placeholder="Search...">
                            <i class="bx bx-search search-icon"></i>
                        </div>
                    </div>

                    <div class="chat-leftsidebar-nav">
                        <ul class="nav nav-pills nav-justified bg-soft-light p-1">
                            <li class="nav-item">
                                <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                    <span class="d-none d-sm-block">Chat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#groups" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="bx bx-group font-size-20 d-sm-none"></i>
                                    <span class="d-none d-sm-block">Groups</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contacts" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                    <span class="d-none d-sm-block">Contacts</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="chat">
                                <div class="chat-message-list" data-simplebar>
                                    <div class="pt-3">
                                        <div class="px-3">
                                            <h5 class="font-size-14 mb-3">Recent</h5>
                                        </div>
                                        <ul class="list-unstyled chat-list inboxes">
                                            @foreach ($data['inboxes'] as $inbox)
                                                <li data-inbox-id="{{$inbox->id}}">
                                                    <a href="#">
                                                        <div class="d-flex align-items-start">

                                                            <div
                                                                class="flex-shrink-0 user-img online align-self-center me-3">
                                                                <img src="{{asset('upload/'.$inbox->getProfile->image)}}"
                                                                    class="rounded-circle avatar-sm" alt="">
                                                                <span class="user-status"></span>
                                                            </div>

                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="text-truncate font-size-14 mb-1">{{$inbox->user->name}}
                                                                </h5>
                                                                <p class="text-truncate mb-0">{{isset($inbox->lastMessage->content) ? $inbox->lastMessage->content : ''}}</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="font-size-11">
                                                                    @php
                                                                    if(isset($inbox->lastMessage->created_at))
                                                                    {
                                                                        $currentTime = now();
                                                                        $timeDifference = $inbox->lastMessage->created_at->diffInMinutes($currentTime);
                                                                        if ($timeDifference > 59) {
                                                                            // Format the created_at time in "hh:mm" format
                                                                            $formattedTime = $inbox->lastMessage->created_at->format('H:i');
                                                                            echo $formattedTime;
                                                                        } else {
                                                                            echo $timeDifference . " min";
                                                                        }
                                                                        }
                                                                    @endphp
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="groups">
                                <div class="chat-message-list" data-simplebar>
                                    <div class="pt-3">
                                        <div class="px-3">
                                            <h5 class="font-size-14 mb-3">Groups</h5>
                                        </div>
                                        <ul class="list-unstyled chat-list">
                                            <li>
                                                <a href="#">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 avatar-sm me-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                G
                                                            </span>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-0">General</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 avatar-sm me-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                R
                                                            </span>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-0">Reporting</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 avatar-sm me-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                M
                                                            </span>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-0">Meeting</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 avatar-sm me-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                A
                                                            </span>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-0">Project A</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 avatar-sm me-3">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                B
                                                            </span>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-0">Project B</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="contacts">
                                <div class="chat-message-list" data-simplebar>
                                    <div class="pt-3">
                                        <div class="px-3">
                                            <h5 class="font-size-14 mb-3">Contacts</h5>
                                        </div>
                            
                                        <div>
                                            @php
                                                $previousInitial = '';
                                            @endphp
                            
                                            @foreach($data['users'] as $user)
                                                @php
                                                    $initial = strtoupper(substr($user->name, 0, 1));
                                                @endphp
                            
                                                @if($previousInitial !== $initial)
                                                    <div>
                                                        <div class="px-3 contact-list">{{ $initial }}</div>
                                                        <ul class="list-unstyled chat-list contact-list-add">
                                                            <li data-user-id="{{$user->id}}">
                                                                <a href="#"  class="d-flex align-items-start">
                                                                    <img src="{{asset('upload/'.$user->profile->image)}}" class="avatar-sm rounded-circle" alt="profile-image">
                                                                    <h5 class="font-size-14 mb-0">{{ $user->name }}</h5>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @php
                                                        $previousInitial = $initial;
                                                    @endphp
                                                @else
                                                    <ul class="list-unstyled chat-list contact-list-add">
                                                        <li data-user-id="{{$user->id}}">
                                                            <a href="#" class="d-flex align-items-start">
                                                                <img src="{{asset('upload/'.$user->profile->image)}}" class="avatar-sm rounded-circle" alt="profile-image">
                                                                <h5 class="font-size-14 mb-0">{{ $user->name }}</h5>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                </div>
                <!-- end chat-leftsidebar -->

                <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1" style="display: none">
                    <div class="card">
                        <div class="p-3 px-lg-4 border-bottom">
                            <div class="row">
                                <div class="col-xl-4 col-7">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                            <img src="assets/images/users/avatar-2.jpg" id="user_image" alt=""
                                                class="img-fluid d-block rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 mb-1 text-truncate" id="user_name"><a href="#"
                                                    class="text-dark">Jennie Sherlock</a></h5>
                                            <p class="text-muted text-truncate mb-0" id="status">Online</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-5">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-search"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                                    <form class="px-2">
                                                        <div>
                                                            <input type="text"
                                                                class="form-control border bg-soft-light"
                                                                placeholder="Search...">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#" id="user_profile_link">Profile</a>
                                                    <a class="dropdown-item" href="#">Archive</a>
                                                    <a class="dropdown-item" href="#">Muted</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="chat-conversation p-3 px-2" data-simplebar>
                            <ul class="list-unstyled conversation mb-0">
                                
                            </ul>
                        </div>

                        <form id="sendMessageForm" method="POST">
                            @csrf
                            <div class="p-3 border-top">
                                <div class="row">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" id="messageInput" class="form-control border bg-soft-light"
                                                placeholder="Enter Message...">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" id="sendBtn"
                                            class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                                class="d-none d-sm-inline-block me-2">Send</span> <i
                                                class="mdi mdi-send float-end"></i></button>
                                    </div>
                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end user chat -->
            </div>
            <!-- End d-lg-flex  -->
        </div>
    </div>
</div>
@push('chat')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Pusher
    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });
    function updateMessage(inbox_id)
    {
        $.ajax({
        type: 'GET',
        url: "{{ route('message.inbox.message', 'id') }}".replace('id', inbox_id),
        success: function(response) {
            console.log(response);
            $('.user-chat').hide();
            $('.conversation').empty();
            

            // Sort the messages based on the created_at timestamp
            response.messages.sort(function(a, b) {
                var timeA = new Date(a.created_at);
                var timeB = new Date(b.created_at);
                return timeA - timeB;
            });
            var today = new Date();
            var lastDisplayedDate = null;
            $('.user-chat').show();
            for (let index = 0; index < response.messages.messages.length; index++) {
                var message = response.messages.messages[index];
                $('.chat-leftsidebar').removeAttr('style');
                $('.user-chat').show();
                $('#user_name').text(message.receiver.name)
                $('#user_image').attr('src', '{{ asset("upload") }}'+'/' + message.get_profile.image);
                $('#user_profile_link').attr('href', '{{ route("auth.user.profile", "id")}}'.replace('id', message.receiver.id));
                var time = new Date(message.created_at); // Convert the created_at timestamp to a Date object
                var formattedTime = time.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }); // Format the time as 'HH:MM'
                var dateDiff = Math.floor((today - time) / (1000 * 60 * 60 * 24)); // Calculate the difference in days

                var formattedDate;
                if (dateDiff === 0) {
                    formattedDate = 'Today';
                } else if (dateDiff === 1) {
                    formattedDate = 'Yesterday';
                } else if (dateDiff < 7) {
                    var weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    formattedDate = weekday[time.getDay()] + ' ' + time.getDate();
                } else {
                    formattedDate = time.toLocaleDateString([], { year: 'numeric', month: 'short', day: 'numeric' });
                }

                if (formattedDate !== lastDisplayedDate) {
                    var formattedDay = '<li class="chat-day-title">' +
                        '<span class="title">' + formattedDate + '</span>' +
                        '</li>';
                    $('.conversation').append(formattedDay);
                    lastDisplayedDate = formattedDate;
                }

                if (message.sender_id !== {{ auth()->user()->id }}) {
                    var leftHtml = '<li>' +
                        '<div class="conversation-list">' +
                        '<div class="ctext-wrap">' +
                        '<div class="ctext-wrap-content">' +
                        '<h5 class="conversation-name"><a href="#" class="user-name">' + message.sender.name + '</a> <span class="time">' + formattedTime + '</span></h5>' +
                        '<p class="mb-0">' + message.content + '</p>' +
                        '</div>' +
                        '<div class="dropdown align-self-start">' +
                        '<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="bx bx-dots-vertical-rounded"></i>' +
                        '</a>' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item" href="#">Copy</a>' +
                        '<a class="dropdown-item" href="#">Save</a>' +
                        '<a class="dropdown-item" href="#">Forward</a>' +
                        '<a class="dropdown-item" href="#">Delete</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</li>';

                    $('.conversation').append(leftHtml);
                } else {
                    var rightHtml = '<li class="right">' +
                        '<div class="conversation-list">' +
                        '<div class="ctext-wrap">' +
                        '<div class="ctext-wrap-content">' +
                        '<h5 class="conversation-name"><a href="#" class="user-name">' + message.sender.name + '</a> <span class="time">' + formattedTime + '</span>' +
                        '</h5>' +
                        '<p class="mb-0">' + message.content + '</p>' +
                        '</div>' +
                        '<div class="dropdown align-self-start">' +
                        '<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="bx bx-dots-vertical-rounded"></i>' +
                        '</a>' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item" href="#">Copy</a>' +
                        '<a class="dropdown-item" href="#">Save</a>' +
                        '<a class="dropdown-item" href="#">Forward</a>' +
                        '<a class="dropdown-item" href="#">Delete</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</li>';

                    $('.conversation').append(rightHtml);
                }
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    }
    // Subscribe to the channel for receiving messages
    var channel = pusher.subscribe('inbox.1'); // Replace $inbox_id with the actual inbox ID
    channel.bind('App\\Events\\MessageSent', function(data) {
        var message = data.message;
        console.log(message);
        // Clear the message input field after receiving a message
        $('#messageInput').val('');
    });

    // Handle form submission
    $(document).on('click', '#sendBtn', function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        var message = $('#messageInput').val(); // Get the message input value

        // Make AJAX request to send the message
        $.ajax({
            type: 'POST',
            url: "{{ route('message.send') }}", // Replace with the actual route URL
            data: {
                _token: '{{ csrf_token() }}',
                inbox_id: 1, // Replace with the actual inbox ID
                receiver_id: 2, // Replace with the actual receiver ID
                content: message
            },
            success: function(response) {
                console.log(response.message);
                // Clear the message input field after sending the message
                $('#messageInput').val('');
                var inbox_id = 1;
                updateMessage(inbox_id);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $(document).on('click', '.inboxes li', function(event) {
        event.preventDefault();
        $('.inboxes li').removeClass('active');
        $(this).addClass('active');
        var inbox_id = $(this).data('inbox-id');

        updateMessage(inbox_id);
    });

    $(document).on('click','ul.contact-list-add li', function() {
            var user_id = $(this).data('user-id');
            var owner_id = {{ auth()->user()->id }};

            // Perform AJAX request
            $.ajax({
                url: '{{route("contact.add")}}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    owner_id: owner_id,
                    user_id: user_id
                },
                success: function(response) {
                    // Handle the success response here
                    console.log('AJAX request successful');
                    console.log(response);

                    $('#chat').tab('active');
                    // Perform any additional actions, such as showing the old inbox
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.log('AJAX request failed');
                    console.log(xhr.responseText);
                }
            });
        });


});


</script>
@endpush
@include('admin.layouts.footer')
