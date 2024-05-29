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

                        {{-- variation --}}
                        <div class="col-md-12">
                            <hr>
                            <p>Category & Attribute: </p>
                        </div>

                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="form-group col-md-3">
                                    <label for="category_id">category</label>
                                    <select id="categorySelect" name="category_id" class="form-control" data-live-search="true">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }} -
                                                {{ $category->parent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-3">
                                    @foreach ($attributeId as $attribute)
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ $attribute->name }}</label>
                                            <input type="text" class="form-control" name="attribute_ids[]" id=""
                                                aria-describedby="helpId" placeholder="" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div id="attributesContainer" class="col-md-12">
                            <div id="attributes" class="row"></div>
                            <div class="col-md-12">
                                <hr>
                                <p>for variation <span class="font-weight-bold" id="variationName"></span> :
                                </p>
                            </div>


                        <div id="czContainer">
                            <div id="first">
                                <div class="recordset">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>name</label>
                                            <input class="form-control" name="variation_values[value][]" type="text">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>price</label>
                                            <input class="form-control" name="variation_values[price][]" type="text">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>quantity</label>
                                            <input class="form-control" name="variation_values[quantity][]"
                                                type="text">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>sku</label>
                                            <input class="form-control" name="variation_values[sku][]" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{-- delivery --}}




                        <button type="submit" class="btn btn-outline-success mt-5">create</button>

                    </form>
                </div>

            </div>


        </div>
    </div>
@endsection
