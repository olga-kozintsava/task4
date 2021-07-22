@extends('base')

@section('title')
    Log in
@endsection

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center" style="margin: 50px">
            <div class="col-md-4 col-md-offset-4 ">
                <h1>Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="md-3">
                        @if(Session::get('fail'))
                            {{Session::get('fail')}}
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="mb3">
                        <button type="submit" class="btn btn-block btn-dark ">Login</button>
                    </div>
                </form>
                <div class="mb-3" style="margin-top:20px">
                    <p>Don't have an account?   <a href="/signup">
                            <button class="btn btn-block btn-dark btn-sm">Create a new account</button>
                        </a></p>
                </div>

            </div>
        </div>
    </div>
@endsection
