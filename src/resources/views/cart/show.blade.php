@extends('layouts.app')

@section('content')
    @php
        //    dump($product);
        //    dd($array_keys);
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-wrapper text-center d-flex justify-content-between">
                            <div class="h4">Cart</div>
                            <a href="{{ route('product.index') }}" class="btn btn-outline-danger">Close</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <h2></h2>
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="2"><h4><?= $product->name ?></h4></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Description</td>
                                    <td><?= $product->description ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Price</td>
                                    <td><?= $product->price ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
