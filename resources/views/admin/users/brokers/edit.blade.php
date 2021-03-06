@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
            {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
            {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}">
        </div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Edit Broker' .' : '.$user->name ,'items'=>[
            [
            'name'=>'Brokers',
            'url'=>url('/admin/brokers'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{ 'Edit Broker' . $user->name}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'first_name',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $user->first_name,
                                                        'label' => 'first name',
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => 'first name',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'last_name',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $user->last_name,
                                                        'label' => 'last name',
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => 'last name',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
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

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'address',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' =>  $user->address,
                                                        'label' => 'city',
                                                        'placeholder' => 'city',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>

                                                    <div class="col-3">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'phonecode',
                                                        'id' => 'phonecode',
                                                        'type' => 'number',
                                                        'class' => '',
                                                        'value' => $user->phonecode,
                                                        'label' => 'Code',
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
                                                        'value' => $user->mobileNumber,
                                                        'label' => 'Mobile',
                                                        'placeholder' => 'Your Mobile Number',
                                                        'disabled' => false,
                                                        'required' => true
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'whatsapp',
                                                        'id' => 'phonecode',
                                                        'type' => 'number',
                                                        'class' => '',
                                                        'value' =>  $user->whatsapp,
                                                        'label' => 'whatsapp',
                                                        'icon' =>'feather icon-user',
                                                        'placeholder' => 'whatsapp',
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'email',
                                                        'id' => '',
                                                        'type' => 'email',
                                                        'class' => '',
                                                        'value' => $user->email,
                                                        'label' => 'email',
                                                        'icon' =>'feather icon-mail',
                                                        'placeholder' => 'email',
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'password',
                                                        'id' => '',
                                                        'type' => 'password',
                                                        'class' => '',
                                                        'value' => '',
                                                        'label' => 'password',
                                                        'icon' =>'feather icon-lock',
                                                        'placeholder' => 'password',
                                                        'disabled' => false,
                                                        'required' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'password_confirmation',
                                                        'id' => '',
                                                        'type' => 'password',
                                                        'class' => '',
                                                        'value' => '',
                                                        'label' =>'confirm password',
                                                        'icon' =>'feather icon-lock',
                                                        'placeholder' =>'confirm password',
                                                        'disabled' => false,
                                                        'required' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.uploud.file', ['name' =>'user_image','label'=>'Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $user->user_image)])
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
