<form method="POST" action="{{$action}}" id="" class="" enctype="multipart/form-data">
    @csrf
    <div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">{{$name}}</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <div class="data-items pb-3">
            <div class="data-fields px-2 mt-3">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'agency_name',
                        'id' => '',
                        'type' => 'text',
                        'class' => '',
                        'label' => '* Agency Name',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'agency name',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'manager_name',
                        'id' => '',
                        'type' => 'text',
                        'class' => '',
                        'label' => '* Manager Name',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'manager name',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        <label>* Country</label>
                        <select id="countryList" class="form-control selectpicker mb-2" data-live-search="true" name="country_id" required>
                            <option selected disabled>Choose Country</option>
                            @foreach(\App\Model\Country::all() as $country)
                                <option phonecode="{{ $country->phonecode }}"
                                        value="{{ $country->id }}"
                                        @if ( old('country_id') == $country->id ) {{ 'selected' }} @endif
                                        id="shop-country">{{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'address',
                        'id' => '',
                        'type' => 'text',
                        'class' => '',
                        'label' => '* City',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'city',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>
                    <div class="col-3">
                        @include('admin.components.inputs.text', [
                        'name' => 'phonecode',
                        'id' => 'phonecode',
                        'type' => 'number',
                        'class' => '',
                        'label' => '* Code',
                        'placeholder' => 'Code',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>
                    <div class="col-9">
                        @include('admin.components.inputs.text', [
                        'name' => 'mobileNumber',
                        'id' => '',
                        'type' => 'number',
                        'class' => '',
                        'label' => '* Mobile',
                        'placeholder' => 'Your Mobile Number',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'telephone',
                        'id' => '',
                        'type' => 'number',
                        'class' => '',
                        'label' => 'Telephone',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'telephone',
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'email',
                        'id' => '',
                        'type' => 'email',
                        'class' => '',
                        'label' => '* Email',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'email',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password',
                        'id' => '',
                        'type' => 'password',
                        'class' => 'password',
                        'label' =>'* Password',
                        'icon' =>'feather icon-lock',
                        'placeholder' => 'password',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password_confirmation',
                        'id' => '',
                        'type' => 'password',
                        'class' => '',
                        'label' => '* Password Confirmation',
                        'icon' =>'feather icon-lock',
                        'placeholder' => 'password confirmation',
                        'disabled' => false,
                        'required' => true
                        ])
                    </div>
                    <div class="col-xl-6 col-md-6 col-6">
                        @include('admin.components.uploud.file', ['name' =>'user_image','label'=>'* Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'required' => true, 'value'=>''])
                    </div>
                </div>
            </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            <div class="cancel-data-btn">
                <button type="button" class="btn btn-outline-danger">Cancel</button>
            </div>
        </div>
    </div>
</div>
</form>
@include('admin.layout.scripts.country.index')

