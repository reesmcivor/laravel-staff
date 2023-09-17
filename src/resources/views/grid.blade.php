@if($staff)

    <div class="users flex flex-wrap">
        @foreach($staff as $user)
            <div class="user flex">
                <a href="{{ route('dashboard.user', $user->id) }}" class="text-center mb-10 flex flex-col">
                    <div class="rounded-full overflow-hidden h-32 w-32 float-left m-2">
                        <img src="{{ $user->getPhoto() ?? "" }}" />
                    </div>
                    <div>
                        {{ $user->name }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endif

