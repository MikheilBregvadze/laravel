@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">

        <br>
        <h3 class="text-center">Edit Record of Lector</h3>
        <br>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ action('LectorController@update', $id) }}">
            
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">

                <input type="text" name="first_name" class="form-control" value="{{ $lector->first_name }}" placeholder="Enter Name">

            </div>
            <div class="form-group">

                <input type="text" name="last_name" class="form-control" value="{{ $lector->last_name }}" placeholder="Enter Last Name">

            </div>

             <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Edit">
            </div>
        
        </form>

    </div>
</div>

@endsection