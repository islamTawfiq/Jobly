@extends('site.layout.index')
@section('page_js')
<script>
    let countryList = document.getElementById("countryList") //select list with id countryList
    let phoneCode = document.getElementById('phonecode') //span with id phonecode

    countryList.addEventListener('change', function(){
     phoneCode.value = this.options[this.selectedIndex].getAttribute("phonecode");
    });
</script>
@stop
@section('content')
    <main>
        <div class="signUpFamily">
            <div class="container">
                <p class="h4 mb-3">Broker Register</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sponsorRegister">
                            <form action="{{url('/broker-register')}}" method="POST" enctype="multipart/form-data" class="form-group">
                                @csrf
                                <div>
                                    <label><i class="fas fa-star-of-life"></i> Name</label>
                                </div>
                                <div class="fullName mb-2">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" required class="first" placeholder="Your first name">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" required class="last" placeholder="Your last name">
                                </div>

                                <label><i class="fas fa-star-of-life"></i> Country</label>
                                <select id="countryList" class="form-control selectpicker mb-2" data-live-search="true" name="country_id" required>
                                    <option selected disabled>Choose Country</option>
                                    @foreach(\App\Model\Country::all() as $country)
                                       <option phonecode="{{ $country->phonecode }}"
                                               value="{{ $country->id }}"
                                               id="shop-country">{{ $country->name }}
                                      </option>
                                    @endforeach
                                </select>

                                <label><i class="fas fa-star-of-life"></i> City</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="City" required>

                                <label><i class="fas fa-star-of-life"></i> Mobile</label>
                                <input type="number" name="phone" value="{{ old('phone') }}" id="phonecode" class="form-control" placeholder="Your phone number" required>

                                <label><i class="fas fa-star-of-life"></i> WhatsApp Number</label>
                                <input type="number" name="whatsapp" value="{{ old('whatsapp') }}" class="form-control" placeholder="Your whatsapp number" required>

                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your email" required>

                                <label><i class="fas fa-star-of-life"></i> Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your password" required>

                                <label><i class="fas fa-star-of-life"></i> Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Your confirm password">

                                <!-- upload image -->
                                <label><i class="fas fa-star-of-life"></i> National ID <span class="font-weight-bold">(Attach photos)</span></label>
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
