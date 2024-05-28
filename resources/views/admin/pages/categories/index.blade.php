@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mt-5">
            <div>
                <h1 class="mt-3">index categories</h1>
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
                        <th scope="col">name</th>
                        <th scope="col">parent</th>
                        <th scope="col">description</th>
                        <th>operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <th>{{ $category->name }}</th>
                            <th>
                                @if ($category->parent_id == 0)
                                    -
                                @else
                                    {{ $category->parent->name }}
                                @endif
                            </th>
                            <th>
                                {{ $category->description }}
                            </th>
                            <th>
                                <a href="{{ route("admin.categories.edit", $category->id ) }}">edit</a>
                            </th>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
