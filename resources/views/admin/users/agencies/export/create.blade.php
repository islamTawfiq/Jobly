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
                        'label' => 'agency name',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'agency name',
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'manager_name',
                        'id' => '',
                        'type' => 'text',
                        'class' => '',
                        'label' => 'manager name',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'manager name',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        <select id="countryList" class="form-control selectpicker mb-2" data-live-search="true" name="country_id" required>
                            <option selected disabled>Choose Country</option>
                            @foreach(\App\Model\Country::all() as $country)
                                <option phonecode="{{ $country->phonecode }}"
                                        value="{{ $country->id }}"
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
                        'label' => 'city',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'city',
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'phone',
                        'id' => 'phonecode',
                        'type' => 'number',
                        'class' => '',
                        'label' => 'phone',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'phone',
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'telephone',
                        'id' => '',
                        'type' => 'number',
                        'class' => '',
                        'label' => 'telephone',
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
                        'label' => 'email',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'email',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password',
                        'id' => '',
                        'type' => 'password',
                        'class' => 'password',
                        'label' =>'password',
                        'icon' =>'feather icon-lock',
                        'placeholder' => 'password',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password_confirmation',
                        'id' => '',
                        'type' => 'password',
                        'class' => '',
                        'label' => 'password confirmation',
                        'icon' =>'feather icon-lock',
                        'placeholder' => 'password confirmation',
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-6 col-md-6 col-6">
                        @include('admin.components.uploud.file', ['name' =>'user_image','label'=>'Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'required' => true, 'value'=>''])
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

