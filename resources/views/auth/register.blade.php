
@extends('layout.app')

@section('content')

<!-- register container starts -->

<div class="login-container">
    <div class="container bg-white p-3" style="border-radius: 8px">

        <form method="post" action="{{ url('/register')  }}">
            @csrf
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control @error('name') border-red  @enderror " id="name" name="name" aria-describedby="nameHelp"
                       placeholder="Your full name">

                @error('name')
                <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control mt-2 @error('email') border-red  @enderror" id="email" name="email" aria-describedby="emailHelp"
                       placeholder="Your email address">

                @error('email')
                <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control mt-2 @error('username') border-red  @enderror" id="username" name="username" aria-describedby="userNameHelp"
                       placeholder="Your username">
                @error('username')
                <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control mt-2 @error('password') border-red  @enderror" id="password" name="password" placeholder="Password">
                @error('password')
                <div class="text-danger mb-2" style="font-weight: bold; font-size: 12px;">
                    {{ $message  }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control mt-2 @error('password_confirmation') border-red  @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">

            </div>

            <button type="submit" class="btn btn-primary my-3" style="width: 100%; border-radius: 2px; font-size: 16px">Create Account</button>
        </form>
    </div>
</div>

<!-- register container ends -->

@endsection
