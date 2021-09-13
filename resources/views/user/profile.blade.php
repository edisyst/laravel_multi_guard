@extends('user.user_master')

@section('user_content')

    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- card_profile -->
        <section class="counter_area">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"alt="Card image cap"
                     src="{{ url('/upload/user_images/') . ((!empty($user->profile_photo_path))? '/'.$user->profile_photo_path : '/no_image.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">User Name: {{ $user->name }}</h5>
                    <p class="card-text">User  Email: {{ $user->email }}</p>
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Edit profile</a>
                </div>
            </div>
        </section>
        <!--/ card_profile -->
    </div><!--/middle content wrapper-->

@endsection
