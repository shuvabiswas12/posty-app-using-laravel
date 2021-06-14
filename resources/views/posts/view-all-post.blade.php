@foreach($posts as $post)

    <br>
    <li class="mb-4">
        <div class="d-flex">
            <a href="{{ route('user_profile', $post->user) }}"><strong>{{ $post->user->name }}</strong></a>
            <p class="mx-2"><small
                    class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
        </div>
        <p class="mb-2">{{ $post->body }} </p>
        <div style="margin-left: -6px;" class="d-flex">
            <div class="btn-group">
                @auth
                    {{--@if($post->ownedBy(auth()->user()))--}}
                    {{-- instead of "if" directives we are using "can" which is directives --}}
                    @can('delete', $post)  {{-- this is working because we defined postPolicy --}}
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="like-button">Delete</button>
                    </form>
                    @endcan
                    {{--@endif--}}
                    @if(!$post->likedBy(auth()->user()))

                        {{-- Here we use route model binding in the form's action section. --}}
                        <form action="{{ route('posts.likes', $post) }}" method="post">
                            @csrf
                            <button style="display: inline-block;" class="like-button">Like
                            </button>
                        </form>

                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post">
                            @csrf

                            {{-- We use method profing here because we have to use
                            'delete' in the form post. but in the form here we can not use 'delete' method --}}

                            @method('DELETE') {{-- This is called method profing --}}

                            <button style="display: inline-block;" class="like-button">Unlike
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <span style="display: inline-block; margin-top: 2px" class="text-muted mx-2">
                                        <strong
                                            style="display: block"><b>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</b></strong>
                                    </span>


        </div>
    </li>

@endforeach

{{-- This is for pagination --}}
{{ $posts->links() }}
