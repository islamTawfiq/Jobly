@extends('site.layout.dashboard')
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

        @include('site.components.dashboard.topMain', ['pageName' => 'Edit Your Profile'])

        <div class="formDashboard">
            <div class="container">
                <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'first_name',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->first_name,
                                'label' => '* First Name',
                                'placeholder' => 'First name',
                                ])
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'last_name',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->last_name,
                                'label' => '* Last Name',
                                'placeholder' => 'Last name',
                                ])
                        </div>
                        <div class="col-12">
                            <label>* Country</label>
                            <select id="countryList" class="form-control selectpicker mb-2" data-live-search="true" name="country_id" required>
                                <option selected disabled>Choose Country</option>
                                @foreach(\App\Model\Country::all() as $country)
                                   <option phonecode="{{ $country->phonecode }}"
                                        value="{{$country->id}}"
                                        @if ( $user->country_id == $country->id ) {{ 'selected' }} @endif
                                        id="shop-country" >
                                        {{$country->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'address',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->address,
                                'label' => '* Address',
                                'placeholder' => 'Address',
                                ])
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'phone',
                                'id' => 'phonecode',
                                'type' => 'number',
                                'class' => '',
                                'value' =>  $user->phone,
                                'label' => '* Mobile Number',
                                'placeholder' => 'Mobile Number',
                                ])
                            <span class="editMobile">Edit</span>
                            <span class="float-right needNewConfirm">Need New Confirm</span>
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'email',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->email,
                                'label' => '* Email',
                                'placeholder' => 'Your City',
                                ])
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'password',
                                'id' => 'password',
                                'type' => 'password',
                                'class' => 'password',
                                'value' => '',
                                'label' => 'Change Password',
                                'placeholder' => trans('Change Password'),
                                'disabled' => false,
                                ])
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'password_confirmation',
                                'id' => 'password_confirmation',
                                'type' => 'password',
                                'class' => '',
                                'value' => '',
                                'label' => 'Confirm New Password',
                                'placeholder' => trans('Confirm New Password'),
                                'disabled' => false,
                                ])
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary float-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </main>
@stop
