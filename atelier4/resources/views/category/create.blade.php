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

        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>

            <button type="submit" class="btn btn-success btn-block">Add</button>

        </form>
    </div>

@endsection()
