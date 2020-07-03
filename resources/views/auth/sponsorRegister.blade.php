@extends('site.layout.index')
@section('content')
    <main>

        <div class="signUpFamily">
            <div class="container">
                <p class="h4 mb-3">Sponsor Register</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sponsorRegister">
                            <form action="{{url('/sponsor-register')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                @csrf
                                <label><i class="fas fa-star-of-life"></i> First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" required class="form-control" placeholder="Your first name">

                                <label><i class="fas fa-star-of-life"></i> Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" required class="form-control" placeholder="Your last name">

                                <label><i class="fas fa-star-of-life"></i> Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" required class="form-control" placeholder="Your phone number">

                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="Your email">

                                <label><i class="fas fa-star-of-life"></i> Password</label>
                                <input type="password" name="password" required class="form-control" placeholder="Your password">

                                <label><i class="fas fa-star-of-life"></i> Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Your confirm password">

                                <!-- Submit -->
                                <div>
                                    <button class="btn btn-primary float-right">Submit</button>
                                    <span>Already have an account?<a href="{{ url('/login') }}"> Click here</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4">
                        <div class="loginImg mt-4">
                            <img src="{{url('design/site/images/Rectangle 499.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
