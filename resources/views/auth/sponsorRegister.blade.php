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
                                <input type="text" name="address" value="{{ old('address') }}" required class="form-control" placeholder="City">


                                <label><i class="fas fa-star-of-life"></i> Mobile Number</label>
                                <input type="number" name="phone" value="{{ old('phone') }}" id="phonecode" class="form-control" placeholder="Agency Mobile Number" required>

                                <label><i class="fas fa-star-of-life"></i> Email</label>
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
