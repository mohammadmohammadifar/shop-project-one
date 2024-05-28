@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-3">
                <h5>products create</h5>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">

                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf

                        {{-- name --}}
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id=""
                                aria-describedby="helpId" placeholder="" />
                        </div>

                        {{-- brand --}}
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">brand</label>
                            <select class="form-select form-select-lg" name="brand_id" id="">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        {{-- status --}}
                        <div class="mb-3 col-md-4">
                            <label for="" class="form-label">is_active</label>
                            <select class="form-select form-select-lg" name="status" id="">
                                <option value="1">active</option>
                                <option value="0">disactive</option>
                            </select>
                        </div>

                        {{-- description --}}
                        <div class="mb-3">
                            <label for="" class="form-label">description</label>
                            <textarea type="text" class="form-control" name="description" id="" aria-describedby="helpId"
                                placeholder=""> </textarea>
                        </div>


                        <hr>

                        {{-- image --}}
                        <div class="header">
                            <p class="h4"> image</p>
                        </div>
                        <div class="row col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">primary_image</label>
                                <input type="file" class="form-control" name="primary_image" id=""
                                    aria-describedby="helpId" placeholder="" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">images</label>
                                <input type="file" class="form-control" name="images[]" id=""
                                    aria-describedby="helpId" placeholder="" multiple />
                            </div>

                        </div>
                        <hr>

                        {{-- category --}}

                        <div>
                            <h5>category</h5>
                        </div>

                        <div>
                            <div class="mb-3 col-md-4 center">
                                <label for="" class="form-label">category</label>
                                <select class="form-select form-select-lg" name="Category_id" id="">
                                    <option value="">select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }} - {{ $category->parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        {{-- delivery --}}




                        <button type="submit" class="btn btn-outline-success">create</button>

                    </form>
                </div>

            </div>


        </div>
    </div>
@endsection
