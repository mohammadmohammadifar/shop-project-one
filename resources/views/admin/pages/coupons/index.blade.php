@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mt-5">
            <div>
                <h1 class="mt-3">index coupons</h1>
            </div>
            <div>
                <a href="{{ route('admin.coupons.create') }}" class="btn btn-outline-primary"> create</a>
            </div>
        </div>
        <hr>

        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">code</th>
                        <th scope="col">type</th>

                        <th>operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                        <tr>
                            <th>{{ $coupon->id }}</th>
                            <th>{{ $coupon->name }}</th>
                            <th>{{ $coupon->code }}</th>
                            <th>{{ $coupon->type }}</th>

                            <th>
                                <a href="{{ route("admin.categories.edit", $coupon->id ) }}">edit</a>
                            </th>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
