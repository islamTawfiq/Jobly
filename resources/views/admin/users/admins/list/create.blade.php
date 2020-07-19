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
                        'name' => 'name',
                        'id' => 'name',
                        'type' => 'text',
                        'class' => '',
                        'value' => '',
                        'label' => 'Admin Name',
                        'icon' =>'feather icon-user',
                        'placeholder' => 'Admin Name',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'email',
                        'id' => 'email',
                        'type' => 'email',
                        'class' => '',
                        'value' => '',
                        'label' => 'Admin Email',
                        'icon' =>'feather icon-mail',
                        'placeholder' => 'Admin Email',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'admin_group',
                        'id' => 'admin_group',
                        'class' => 'danger',
                        'value' => '',
                        'label' => 'Admin Group',
                        'oldcheaked' => '',
                        'items' => \App\Model\AdminGroup::get(),
                        'placeholder' => 'Admin Group',
                        'checked' => false,
                        'disabled' => false,
                        ])
                    </div>


                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password',
                        'class' => '',
                        'value' => '',
                        'label' => 'Admin Password',
                        'icon' =>'feather icon-lock',
                        'placeholder' => 'Admin Password',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password_confirmation',
                        'id' => 'password_confirmation',
                        'type' => 'password',
                        'class' => '',
                        'value' => '',
                        'label' => 'Admin Password Confirmation' ,
                        'icon' =>'feather icon-lock',
                        'placeholder' => 'Admin Password Confirmation',
                        'disabled' => false,
                        ])
                    </div>


                </div>
            </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <button type="submit" class="btn btn-primary">Add Data</button>
            </div>
            <div class="cancel-data-btn">
                <button type="button"  class="btn btn-outline-danger">Cancel</button>
            </div>
        </div>
    </div>
</div>
</form>
