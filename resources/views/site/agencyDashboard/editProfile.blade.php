@extends('site.layout.dashboard')
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
                                'name' => 'agency_name',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->agency_name,
                                'label' => '* Agency Name',
                                'placeholder' => 'Agency name',
                                ])
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'manager_name',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->manager_name,
                                'label' => '* Manager Name',
                                'placeholder' => 'Manger name',
                                ])
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'phone',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->phone,
                                'label' => '* Mobile Number',
                                'placeholder' => 'Mobile Number',
                                ])
                            <a href="#" class="editMobile">Edit</a>
                            <span class="float-right needNewConfirm">Need New Confirm</span>
                        </div>
                        <div class="col-12">
                            @include('site.components.inputs.text', [
                                'name' => 'telephone',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  $user->telephone,
                                'label' => '* Telephone',
                                'placeholder' => 'Telephone',
                                ])
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

                        {{--  <div class="col-12">
                            <label>Change Password</label>
                            <input type="password" class="form-control" placeholder="************">
                        </div>  --}}
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary float-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </main>
@stop