@extends('base')

@section('title')
    Sign up
@endsection

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center" style="margin: 50px">
            <div class="col-md-4 col-md-offset-4 ">
                <h1>Registration</h1>
                <form action="/signup" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
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
                        <button type="submit" class="btn btn-block btn-dark ">Register</button>
                    </div>
                </form>
                <div class="mb3" style="margin-top:20px">
                    <p>Already have an account? <a href="/login">
                            <button class="btn btn-block btn-dark btn-sm">Login here</button>
                        </a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
