@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-3">
                <h5>categories create</h5>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4">

                    <form action="{{ route('admin.categories.update' ,$category->id) }}" method="POST">
                        @method("PUT")
                        @csrf

                        {{-- name --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id=""
                                aria-describedby="helpId" placeholder="" value="{{ $category->name }}" />
                        </div>

                        {{-- parent_id --}}
                        <div class="mb-3">
                            <label for="" class="form-label">parent</label>
                            <select class="form-select form-select-lg" name="parent_id" id="">
                                <option value="0">Parent</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ $category->parent_id ==$parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- description --}}
                        <div class="mb-3">
                            <label for="" class="form-label">description</label>
                            <textarea type="text" class="form-control" name="description" id="" aria-describedby="helpId"
                                placeholder=""> {{ $category->description }} </textarea>
                        </div>

                        {{-- icon --}}
                        <div class="mb-3">
                            <label for="" class="form-label">icon</label>
                            <input type="text" class="form-control" name="icon" id=""
                                aria-describedby="helpId" placeholder="" value="" />
                        </div>

                        {{-- is_active --}}
                        <div class="mb-3">
                            <label for="" class="form-label">is_active</label>
                            <select class="form-select form-select-lg" name="is_active" id="">
                                <option value="1">active</option>
                                <option value="0">disactive</option>
                            </select>
                        </div>



                        <button type="submit" class="btn btn-outline-success">create</button>

                    </form>
                </div>

            </div>


        </div>
    </div>
@endsection
