@extends('home')

@section('contenu')
    <div class="container">
        @if(count($errors->all()))
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <form action="{{route('category.update',$category)}}" method="POST">

            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name" required>
            </div>


            <button type="submit" class="btn btn-success btn-block">Edit</button>

        </form>
    </div>
@endsection
