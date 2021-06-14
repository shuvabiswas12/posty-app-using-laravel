@extends('layout.app')

@section('content')

    <!-- main container starts -->

    <div class="main-body--container">
        <div class="container bg-white" style=" border-radius: 8px;">
            <div class="d-flex flex-column p-3">


                    @component('posts.create-post')
                    @endcomponent


                {{-- Here I moved the create-post-form to create-post file.--}}


                {{--                <form class="mb-3" action="{{ route('posts')  }}" method="post">--}}
                {{--                    @csrf--}}
                {{--                    <div class="form-group my-2">--}}
                {{--                        <textarea class="form-control" name="body" id="body" rows="3" spellcheck="true"--}}
                {{--                                  placeholder="Post something!"></textarea>--}}
                {{--                        @error('body')--}}
                {{--                        <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">--}}
                {{--                            {{ $message  }}--}}
                {{--                        </div>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}
                {{--                    <button type="submit" class="btn btn-primary"--}}
                {{--                            style="font-size: 18px; border-radius: 8px; font-weight: bold;">Post--}}
                {{--                    </button>--}}
                {{--                </form>--}}

                <ul class="my-2">
                    @if($posts->count())

                        @component('posts.view-all-post', ['posts'=>$posts])
                        @endcomponent

                    @else
                        <p>There are no posts yet!</p>
                    @endif

                </ul>
            </div>
        </div>
    </div>

    <!-- main container ends -->

@endsection
