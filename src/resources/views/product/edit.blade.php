@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-wrapper text-center d-flex justify-content-between">
                            <div class="h4">Product form</div>
                            <a href="{{ route('product.index') }}" class="btn btn-outline-danger">Close</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', ['product_id' => $product->id]) }}" method="POST" >
                            @csrf
                            @method('put')
                            <div class="form-outline mb-4">
                                <input name="name" value="<?= $product->name ?>" type="text" id="name" class="form-control"/>
                                <label class="form-label" for="name">Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="description" value="<?= $product->description ?>" type="text" id="description" class="form-control"/>
                                <label class="form-label" for="description">Description</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="price" value="<?= $product->price ?>" type="text" id="price" class="form-control"/>
                                <label class="form-label" for="price">Price</label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success btn-block mb-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
