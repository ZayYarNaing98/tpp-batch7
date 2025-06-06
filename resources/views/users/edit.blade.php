@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit User
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" value="{{$user->gender}}" class="form-control mb-2">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('users.index')}}" class="btn btn-secondary ms-2">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
