@extends('home')

@section('contenu')

    <div class="container">
        <h1>Name :{{$category->name}}</h1>
        <br>
        <a href="{{route('category.edit',$category)}}" class="btn btn-info">Edit</a>

        <form method="post" action="{{route('category.destroy',$category)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection
