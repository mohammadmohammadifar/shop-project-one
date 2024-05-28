@extends('admin.layouts.index')

@section('content')
    <div class="row mt-3 container">
        <div class="col-md-4">
            <div class="col-md-4">
                <h5> brand create</h5>
            </div>
            <hr>
            <div>
                <form action="{{ route('admin.brands.store') }}" method="POST">
                    @csrf

                    {{-- name --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="input name" />
                    </div>
                    <button type="submit" class="btn btn-outline-primary">create</button>
                    <a href="{{ route('admin.attributes.index') }}" class="btn btn-outline-success">back</a>

                </form>
            </div>

            ّ


        </div>
    </div>
@endsection
