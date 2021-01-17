<div class="message-wrapper">
    <ul class="messages">
        @foreach ($mess as $item)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($item->from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{$item->message}}</p>
                    <p class="date">{{$item->created_at}}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="submit">
</div>