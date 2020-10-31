@extends('home')

@section('contenu')

    <div class="container">
        <h1>Name :{{$product->name}}</h1>
        <h3>Category :{{$product->category->name}}</h3>
        <br>
        <a href="{{route('userProduct.edit',$product)}}" class="btn btn-info">Edit</a>

        <form method="post" action="{{route('userProduct.destroy',$product)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>
@endsection
