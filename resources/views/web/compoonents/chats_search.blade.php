@forelse ($users as $index => $user)
<a href="{{ route('web.chat', $user->id) }}" class="text-decoration-none">
    <div class="chat">
        <div class="chat_info">
            <div class="chat_avatar">
                <img src="{{ getImage('Users', $user->profile_image) }}" alt="" />
            </div>
            <div>
                <h3 class="contact_name">{{ $user->full_name }}</h3>
                @if ($user->lastMessage() && $user->lastMessage()->message)
                    <p class="contact_msg">{{ $user->lastMessage()->message }}</p>
                @endif
            </div>
        </div>

        <div class="chat_status">
            @if ($user->lastMessage() && $user->lastMessage()->message)
                <div class="chat_date new">{{ $user->lastMessage()->created_at->format('g:i A') }}</div>
            @endif

            @if (count($user->unSeenMessages()))
                <div class="messages_count">{{ count($user->unSeenMessages()) }}</div>
            @endif
        </div>
    </div>
</a> 
@empty
    <div class="alert alert-danger text-center">{{ __('No Data') }}</div>
@endforelse 

