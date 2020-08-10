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
                <p class="h4 mb-3" style="display: inline-block">Sponsor Register</p>
                <span class="newSpan">( we are family, we need to hire )</span>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sponsorRegister">
                            <form action="{{url('/sponsor-register')}}" method="POST" enctype="multipart/form-data" class="form-group">
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
                                    @foreach(\App\Model\ImportingCountry::all() as $country)
                                       <option phonecode="{{ $country->phonecode }}"
                                               value="{{ $country->id }}"
                                               @if ( old('country_id') == $country->id ) {{ 'selected' }} @endif
                                               id="shop-country">{{ $country->name }}
                                      </option>
                                    @endforeach
                                </select>

                                <label><i class="fas fa-star-of-life"></i> City</label>
                                <input type="text" name="address" value="{{ old('address') }}" required class="form-control" placeholder="City">


                                <label><i class="fas fa-star-of-life"></i> Mobile</label>
                                <div class="regist mb-2">
                                    <input type="text" name="phonecode" value="{{ old('phonecode') }}" id="phonecode" class="first" placeholder="code" required>
                                    <input type="text" value="{{ old('mobileNumber') }}" name="mobileNumber" class="last" placeholder="Your Mobile Number" required>
                                </div>

                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your email">

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
