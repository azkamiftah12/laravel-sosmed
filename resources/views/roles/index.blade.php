<!-- resources/views/roles/index.blade.php -->

@extends('layouts.layoutadmin')

@section('content')
    <h1>Roles</h1>

    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
                <tr>
                    <td>{{ $role->id_role }}</td>
                    <td>{{ $role->nama_role }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No roles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
