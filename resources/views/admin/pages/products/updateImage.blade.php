@extends('admin.layouts.index')


@section('content')
    <div class="container">
        <div class="mt-5">
            <div>
                <h4> edit image : <picture>
                        <source srcset="sourceset" type="image/svg+xml" />
                        <img src="{{ env('UPLOAD_IMAGE').$product->primary_image  }}" class="img-fluid" alt="image desc" />
                    </picture>
                </h4>
            </div>
            <hr>

            <div>
                <img src="{{ env('UPLOAD_IMAGE').$product->primary_image }}" class="img-fluid rounded-top"
                    alt="" />
            </div>
        </div>

        <hr>

        {{-- image --}}
        <div class="row col-md-6 mt-5">
            @foreach ($product->productImages as $image)
                *66
                <div class="col-md-6">
                    <div class="card text-start">
                        <img class="card-img-top imaProduct" src="{{ env('UPLOAD_IMAGE') . $image->image }}" alt="Title" />
                        <div class="card-body text-center">
                            <form action="#" method="POST">
                                @method('DELETE')
                                @csrf

                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <button class="btn btn-outline-danger" type="submit">delete</button>
                            </form>
                            <form action="{{ route('products.images.set_primary',$product->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <button type="submit" class="btn btn-outline-primary">edit primary image</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
@endsection
