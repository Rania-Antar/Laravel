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


        <form action="{{route('userProduct.update',$product)}}" method="POST">

            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control" value="{{$product->name}}" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="category_id" class="control-label">Category : </label>
                <div class="">
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option {{$product->$category==$category->id? "selected":""}} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Edit</button>

        </form>
    </div>
@endsection
