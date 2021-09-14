@extends('admin.admin_master')

@section('admin_content')


    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- card_profile -->
        <section class="counter_area">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h3>Change Password</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.password.update') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="current_password">{{ __('Current Password') }}</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('New Password') }}</label>
                            <input type="password" class="form-control" id="email" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control" id="email" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                    </form>

                </div>
            </div>
        </section>
        <!--/ card_profile -->
    </div><!--/middle content wrapper-->


@endsection



