@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Create Product for {{auth()->user()->name}}</span>
                </div>


                <div class="card-body">
                    @if ( session('message') )
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                    @endif

                    <form method="POST" action="/products">
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{old('name')}}" />
                        <input type="text" name="description" placeholder="Description" class="form-control mb-2" value="{{old('description')}}" />
                        <input type="text" name="photo" placeholder="Photo" class="form-control mb-2" value="{{old('photo')}}" />
                        <input type="number" name="price" placeholder="Price" class="form-control mb-2" min="1" value="{{old('price')}}" />
                        @foreach($categories as $category) 
                        <p>{{$category}}</p>
                        @endforeach
                            
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                            @foreach($categories as $category) 
                                <option value="{{$category->id}}">{{$category->name}}</option>   
                            @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary " type="submit">Create</button>
                        <a href="/products" class="btn btn-secondary">Back</a>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection