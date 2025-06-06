@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="my-4">Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-outline-success mb-4">+Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->gender }}</td>
                        <th>
                            <form action="{{route('users.status', ['id' => $user->id])}}" method="POST">
                                @csrf
                                <button class="btn btn-sm {{$user->status === 1? 'btn-success' : "btn-danger"}}" type="submit">
                                    {{$user->status === 1 ? 'Active' : "Inactive"}}
                                </button>
                            </form>
                        </th>
                        <th class="d-flex">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                class="btn btn-outline-secondary me-2">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
