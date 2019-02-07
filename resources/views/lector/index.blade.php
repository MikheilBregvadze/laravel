@extends('master')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <br>
            <h3 class="text-center">Lector Data</h3>
            <br>

            @if($message = Session::get('success'))

            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>

            @endif

            <div class="text-right">
                <a href="{{ route('student.create') }}" class="btn btn-primary">Add</a>
            </div>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                @foreach($students as $row)
                <tr>
                    <td>{{ $row['first_name'] }}</td>
                    <td>{{ $row['last_name'] }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>

@endsection


