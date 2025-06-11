@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create Role
            </div>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <label for="name">Name:</label>
                    <input type="text" name='name' placeholder="Enter Role Name" class="form-control"/>
                </div>
                <div class="card-body">
                    @foreach ($permissions as $permission)
                        <div class="my-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="{{ $permission->id }}" name="permissions[]"
                                    id="permission{{ $permission->id }}"/>
                                <label for="permission{{ $permission->id }}" class="form-check-label">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        +Create
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection