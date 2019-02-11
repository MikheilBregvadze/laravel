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
                <a href="{{ route('lector.store') }}" class="btn btn-primary">Add</a>
            </div>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                @foreach($lector as $row)
                <tr>
                    <td>{{ $row['first_name'] }}</td>
                    <td>{{ $row['last_name'] }}</td>
                    <td>{{ $row['file'] }}</td>
                    <td><a href="{{ action('LectorController@edit', $row['id']) }}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form method="POST" class="delete_form" action="{{ action('LectorController@destroy', $row['id']) }}">
                            
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                        
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.delete_form').on('submit', function() {
            if(confirm("Are you sure you want to delete it?")) {
                return true
            }else {
                return false
            }
        });
    });
    </script>

@endsection


