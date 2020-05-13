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

                    <form>
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="form-control mb-2" value="{{old('name')}}" />
                        <input type="text" name="description" placeholder="Description" class="form-control mb-2" value="{{old('description')}}" />
                        <input type="text" name="photo" placeholder="Photo" class="form-control mb-2" value="{{old('photo')}}" />
                        <input type="number" name="price" placeholder="Price" class="form-control mb-2" min="1" value="{{old('price')}}" />

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <table id="example" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:20%">id</th>
                                    <th style="width:80%">Ingredient</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ingredients as $ingredient)
                                <tr>
                                    <td style="width:20%">{{$ingredient->id}}</td>
                                    <td style="width:80%">{{$ingredient->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button id="button_rows" class="btn btn-primary" type="button">Datos</button>
                        <button class="btn btn-primary " type="submit" id="send_button">Create</button>
                        <a href="/products" class="btn btn-secondary">Back</a>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    var table = $('#example').DataTable({
        "bLengthChange": false,
    });
    var data = table
        .rows()
        .data();
    $('#example tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected');
    });

    $('#button_rows').click(function() {
        console.log((table.rows('.selected').data()));

    });

    $("#send_button").click(function(e) {
        e.preventDefault(); debugger;
        var ingredients = table.rows('.selected').data()[0];
        
        var token = '{{csrf_token()}}'; 
        var data = {
            ingredients: ingredients,
            _token: token
        };
        $.ajax({
            type: "post",
            url: "{{route('products.store')}}", 
            data: data,
            success: function(msg) {
                debugger;
            }
        });
    });
</script>

@endsection