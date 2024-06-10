@extends('admin.layouts.index')

@section('content')
    <section class="container">
        <div>
            <h4>create Coupon</h4>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12">

                {{-- name --}}
                <form action="{{ route('admin.coupons.store') }}" method="POST">
                    @csrf

                   <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>

                    {{-- code  --}}
                    {{-- <div class="mb-3 col-md-4">
                        <label for="" class="form-label">code</label>
                        <input type="text" class="form-control" name="code" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div> --}}

                    {{-- type --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">type</label>
                        <select class="form-select form-select-lg" name="type" id="">
                            <option value="1">amount</option>
                            <option value="2">percentage</option>
                        </select>
                    </div>

                    {{-- amount --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">amount</label>
                        <input type="text" class="form-control" name="amount" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>

                    {{-- percentage --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">percentage</label>
                        <input type="text" class="form-control" name="percentage" id=""
                            aria-describedby="helpId" placeholder="" />
                    </div>

                    {{-- max_percentage --}}
                    <div class="form-group col-md-4">
                        <label for="max_percentage_amount">max_percentage</label>
                        <input class="form-control" id="max_percentage_amount" name="max_percentage_amount" type="text"
                            {{ old('max_percentage_amount') }}>
                    </div>

                    {{-- data_expired --}}
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">expired_time</label>
                        <input type="text" class="form-control" name="expired_at" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>


                    {{-- description --}}
                    <div class="form-group col-md-12">
                        <label for="description"> توضیحات </label>
                        <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                    </div>
            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>


                   </div>


            </form>

        </div>
        </div>
    </section>
@endsection
