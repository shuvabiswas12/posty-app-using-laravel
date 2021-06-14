@extends('layout.app')
@section('content')

    <!-- Username and no of posts as well as likes showing section starts -->

    <div class="user-profile">
        <div class="container mb-4" style="margin-top: 15%;">
            <h3>{{ $user->name }}</h3>
            <h6 class="text-white" style="font-size: 18px; font-weight: normal;">This user has {{ $posts->count() }}
                post total and
                received {{ $user->receivedLikes()->count() }} likes.</h6>
        </div>
    </div>

    <!-- Username and no of posts as well as likes showing section ends -->

    <!-- main container starts -->

    <div class="main-body--container">
        <div class="container bg-white" style=" border-radius: 8px;">
            <div class="d-flex flex-column p-3">

                @auth()
                    @if(auth()->user()->id === $user->id)

                        @component('posts.create-post')
                        @endcomponent

                    @endif
                @endauth

                <ul class="my-2">
                    <ul class="my-2">
                        @if($posts->count())

                            @component('posts.view-all-post', ['posts'=>$posts])
                            @endcomponent

                        @else
                            <p>There are no posts yet!</p>
                        @endif

                    </ul>
                </ul>
            </div>
        </div>
    </div>

    <!-- main container ends -->

@endsection
