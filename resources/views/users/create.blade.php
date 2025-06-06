@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                + Create User
            </div>
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" placeholder="Enter Your Name" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" placeholder="Enter Your Address" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" placeholder="Enter Your Phone" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" placeholder="Enter Your Gender" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" placeholder="Enter Your Password" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" placeholder="Enter Your Confirm Password" class="form-control mb-2">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">+Create</button>
                    <a href="{{route('users.index')}}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
