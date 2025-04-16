@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-start">
                    <h2>Students List</h2>
                </div>
                <div class="float-end">
                    <a class="btn btn-success" href="{{ route('students.create') }}">Create New Student</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-4">
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Year</th>
                <th>Section</th>
                <th width="280px">Action</th>
            </tr>
            @if ($students->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">No students found</td>
                </tr>
            @endif
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->year }}</td>
                    <td>{{ $student->section }}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $students->links() }}
    </div>
@endsection
