@extends('panel.layout.app')

@section('main-content')

    <div class="col-md-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Edit Profile
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="name">Name : </label>
                        <input type="text"  id="name" name="name" class="form-control" value="{{ $user->name }}">
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Description : </label>
                        <input type="email"  id="email" name="email" class="form-control" value="{{ $user->email }}">
                        @error('email')
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
