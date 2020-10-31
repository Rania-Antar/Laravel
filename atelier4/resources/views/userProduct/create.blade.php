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

        <form action="{{route('userProduct.store')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>

            <div class="form-group">
                <label for="category_id" class="control-label">Category : </label>
                <div class="">
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Add</button>

        </form>
    </div>
@endsection
