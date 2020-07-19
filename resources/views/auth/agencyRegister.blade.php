@extends('site.layout.index')
@section('content')
    <main>

        <div class="signUpFamily">
            <div class="container">
                <p class="h4 mb-3">Agency Register</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sponsorRegister">
                            <form action="{{url('/agency-register')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                @csrf
                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="user_type_id" id="import" value="3">
                                        <label for="import">We import Labor</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="user_type_id" id="export" value="5">
                                        <label for="export">We export Labor</label>
                                    </div>
                                </div>
                                <label><i class="fas fa-star-of-life"></i> Agency Name</label>
                                <input type="text" name="agency_name" value="{{ old('agency_name') }}" required class="form-control" placeholder="Your Agency name">

                                <label><i class="fas fa-star-of-life"></i> Manager Name</label>
                                <input type="text" name="manager_name" value="{{ old('manager_name') }}" required class="form-control" placeholder="Manger name">

                                <label><i class="fas fa-star-of-life"></i> Country</label>
                                <input type="text" name="country" value="{{ old('country') }}" required class="form-control" placeholder="Country">

                                <label><i class="fas fa-star-of-life"></i> Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" required class="form-control" placeholder="Address">

                                <label><i class="fas fa-star-of-life"></i> Direct Mobile Number</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" required class="form-control" placeholder="Your Agency mobile number">

                                <label><i class="fas fa-star-of-life"></i> Telephone</label>
                                <input type="text" name="telephone" value="{{ old('telephone') }}" required class="form-control" placeholder="Your Telephone">

                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="Your email">

                                <label><i class="fas fa-star-of-life"></i> Password</label>
                                <input type="password" name="password" required class="form-control" placeholder="Your password">

                                <label><i class="fas fa-star-of-life"></i> Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Your confirm password">

                                <!-- upload image -->
                                <label><i class="fas fa-star-of-life"></i> Agency Official Documentation <span class="font-weight-bold">(Attach photos)</span></label>
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="preview-contain" class="upload-photo mb-2">
                                                <img src="{{url('design/site/images/photo-camera.png')}}" alt="camera">
                                            </label>
                                            <input type="file" name="user_image"  id="preview-contain" class="form-control attach" multiple
                                                data-jpreview-container="#preview">
                                        </div>
                                        <div class="col-sm-10">
                                            <!-- image preview -->
                                            <div id="preview" class="jpreview-container"></div>
                                        </div>
                                    </div>
                                </div>

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
