@extends('user.user_master')

@section('user_content')


    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- card_profile -->
        <section class="counter_area">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"alt="Card image cap"
                     src="{{ url('/upload/user_images') . ((!empty($user->profile_photo_path))? '/'.$user->profile_photo_path : '/no_image.jpg') }}">
                <div class="card-body">

                    <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="profile_photo_path">Profile Image</label>
                            <input type="file" class="form-control-file" id="profile_photo_path" name="profile_photo_path">
                        </div>
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update profile</button>
                    </form>

                </div>
            </div>
        </section>
        <!--/ card_profile -->
    </div><!--/middle content wrapper-->

    <script>
        // NON FUNGE.... CHI L'AVREBBE MAI DETTO
        $(document).ready(function () {
            $('#profile_photo_path').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profile_photo_path').attr('src'. e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection



