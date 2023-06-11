@extends('panel.layout.app')

@section('main-content')

    <div class="col-md-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Create Profile
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="name">Name : </label>
                        <input type="text"  id="name" name="name" class="form-control" >
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email"  id="email" name="email" class="form-control" >
                        @error('email')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password"  id="password" name="password" class="form-control" >
                        @error('password')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
{{--                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>

    </div>
@endsection
