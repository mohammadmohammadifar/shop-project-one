@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mt-5">
            <div>
                <h1 class="mt-3">index products</h1>
            </div>
            <div>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary"> create</a>
            </div>
        </div>
        <hr>

        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">picture</th>
                        <th scope="col">name</th>
                        <th scope="col">status</th>
                        <th>operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->id }}</th>
                            <th>
                                <img src="{{ env('UPLOAD_IMAGE') . $product->primary_image }}" class="img-fluid rounded-top img_product"
                                    alt=""  />
                            </th>
                            <th>{{ $product->name }}</th>
                            <th>{{ $product->status }}</th>
                            <th>
                                {{-- <a href="{{ route("admin.product.edit", $product->id ) }}">edit</a> --}}
                            </th>
                            <th>
                                <a href="{{ route('products.images.editImage',$product->id) }}" class="btn btn-outline-primary">image</a>
                            </th>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
