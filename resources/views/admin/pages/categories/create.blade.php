@extends('admin.layouts.index')


@section('title')
    attribute_create
@endsection

@section('script')
    {{-- <script>
        $('#select').selectpicker();
        $(function() {
            $('select').selectpicker();
        });
    </script> --}}
@endsection

@section('content')
    <div class="row mx-5 mt-3">
        <div class="col-md-4">
            <div>
                <h5 class="font-weight-bold">attribute brand</h5>
                <hr>
            </div>


            <form action="{{ route('admin.categories.store') }}" method="Post">
                @csrf

                {{-- name --}}
                <div class="form-group mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                        placeholder="category name" />
                </div>
                @error('name')
                    <span style="font: red">{{ $message }}</span>
                @enderror

                {{-- parent --}}
                <div class="form-group mb-3">
                    <label for="parent_id">parent</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">parent</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="is_active">status</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" >is_active</option>
                        <option value="0">isnt_active</option>
                    </select>
                </div>



                {{-- attribute --}}
                <div class="form-group mb-3">
                    <label for="attributeSelect">attribute</label>
                    <select id="attributeSelect" name="attribute_ids[]" class="form-control attributeSelect" multiple
                        data-live-search="true">
                        @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                </div>


                {{-- is_filter --}}
                <div class="form-group mb-3">
                    <label for="attribute_ids">attributeIsFilter</label>
                    <select id="attributeIsFilter" name="attribute_is_filter_ids[]" class="form-control attribute_is_filter"
                        multiple data-live-search="true">
                        @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- variation--}}
                <div class="form-group mb-3">
                    <label for="attribute_ids">variation</label>
                    <select id="variationSelect" name="variation_id" class="form-control "
                         data-live-search="true">
                        @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- icon --}}
                <div class="form-group mb-3">
                    <label for="icon">icon</label>
                    <input class="form-control" id="icon" name="icon" type="text">
                </div>

                {{-- description --}}
                <div class="form-group mb-3 col-md-12">
                    <label for="description">description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>

                {{-- btn --}}
                <button class="btn btn-primary mt-3" type="submit">create</button>
                <a class="btn btn-outline-danger mt-3 mx-3" href="{{ route('admin.attributes.index') }}"> back </a>


            </form>
        </div>
    </div>
@endsection
