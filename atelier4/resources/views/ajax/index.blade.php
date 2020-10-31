@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" class="">
            @csrf
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name :</label>
                <div class="col-sm-9">
                    <input name="name" id="name" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="category_id" class="col-sm-3 control-label">Category : </label>
                <div class="col-sm-9">
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button id="btnAdd" class="btn btn-success btn-block" type="button">Add</button>
                <button id="btnCancel" class="btn btn-danger btn-block" type="button">Cancel</button>
            </div>
        </form>

        <hr>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Category</th>
            </tr>
        </table>
        <br>

    </div>

@endsection


@section('scripts')
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection
