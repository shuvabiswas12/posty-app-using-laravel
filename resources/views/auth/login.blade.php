@extends('layout.app')
@section('content')

    <!-- login container starts -->

    <div class="login-container">
        <div class="container bg-white p-3" style="border-radius: 8px">
            @if(session('status'))
                <div class="text-danger text-center">
                    {{ session('status')  }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for=""></label>
                    <input type="email" name="email" class="form-control @error('email') border-red  @enderror"
                           id="email" aria-describedby="emailHelp"
                           placeholder="Your email address">
                    @error('email')
                    <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
                        {{ $message  }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password"
                           class="form-control mt-2 @error('password') border-red  @enderror " id="password"
                           placeholder="Password">
                    @error('password')
                    <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
                        {{ $message  }}
                    </div>
                    @enderror
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary my-3"
                        style="width: 100%; border-radius: 2px; font-size: 16px">Login
                </button>
            </form>
        </div>
    </div>

    <!-- login container ends -->

@endsection
