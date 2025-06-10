@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Role
            </div>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                {{method_field('PUT')  }}
                <div class="card-body">
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary me-2" type="submit">
                        Update
                    </button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
