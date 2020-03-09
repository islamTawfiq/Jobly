@extends('site.layout.index')
@section('content')

    @include('site.layout.navbars.mainNav')

      <div class="signIn">
        <div class="container">
            <p class="h4 mb-3">Sign In</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="sponsorRegister">
                        <form class="form-group">
                            <label><i class="fas fa-star-of-life"></i> Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Your Mobile Number">
                            <label><i class="fas fa-star-of-life"></i> Password</label>
                            <input type="password" class="form-control" placeholder="Your Password">
                            <div class="mt-4">
                                <button class="btn btn-primary float-right">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="loginWithSocial">
                        <p>Login with social links</p>
                        <a href="" class="loginFacebook">
                            <img src="{{url('design/site/images/facebook.png')}}" alt="facebook">
                            <span>Login with facebook</span>
                        </a>
                        <a href="" class="loginGoogle">
                            <img src="{{url('design/site/images/search.png')}}" alt="google">
                            <span>Login with Google</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop