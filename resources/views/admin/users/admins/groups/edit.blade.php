@extends('admin.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/forms/wizard.css')}}">
@stop
@section('page_js')
    <script src="{{url('design/admin/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{url('design/admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('design/admin/js/scripts/forms/wizard-steps.js')}}"></script>
@stop
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => trans('web.editAdmin').' : '.$item->name ,'items'=>[
           [
           'name'=>trans('web.adminGroups'),
           'url'=>url('/admin/admin-groups'),
           ]
           ]
           ])
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                         role="tabpanel">
                                        <form action="{{str_replace('/edit','',url()->current())}}" method="POST"
                                              class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                @include('admin.components.inputs.text', [
                                                               'name' => 'name',
                                                               'id' => 'name',
                                                               'type' => 'text',
                                                               'class' => '',
                                                               'value' => $item->name,
                                                               'label' => 'Group Name',
                                                               'icon' =>'feather icon-user',
                                                               'placeholder' => 'Group Name',
                                                               'disabled' => false,
                                                               'required' => true,
                                                               ])
                                                            </div>
                                                        </div>
                                                        <div class="row">


                                                            <div class="col-md-6">
                                                                @include('admin.components.inputs.textarea', [
                                                                 'name' => 'description',
                                                                 'id' => 'description',
                                                                 'type' => 'text',
                                                                 'class' => '',
                                                                 'value' => $item->description,
                                                                 'label' => 'Group Description',
                                                                 'icon' =>'icon-phone',
                                                                 'placeholder' => 'Group Description',
                                                                 'disabled' => false,
                                                                 ])
                                                            </div>
                                                        </div>

                                                        <hr class="divider">


                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="table-responsive border rounded px-1 ">
                                                        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i
                                                                class="feather icon-lock mr-50 "></i>Permission</h6>
                                                        <table class="table table-borderless">
                                                            <thead>
                                                            <tr>
                                                                <th>{{trans('web.module')}}</th>
                                                                <th>{{trans('web.read')}}</th>
                                                                <th>{{trans('web.create')}}</th>
                                                                <th>{{trans('web.edit')}}</th>
                                                                <th>{{trans('web.delete')}}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <tr>
                                                                <td>{{trans('web.settings')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'settings_show',
                                                                        'id' => 'settings_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->settings_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'settings_edit',
                                                                        'id' => 'settings_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->settings_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td></td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{trans('web.admins')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_show',
                                                                        'id' => 'admins_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admins_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_add',
                                                                        'id' => 'admins_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admins_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_edit',
                                                                        'id' => 'admins_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admins_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admins_delete',
                                                                        'id' => 'admins_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admins_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{trans('web.adminGroups')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_show',
                                                                        'id' => 'admin_groups_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admin_groups_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_add',
                                                                        'id' => 'admin_groups_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admin_groups_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_edit',
                                                                        'id' => 'admin_groups_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admin_groups_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'admin_groups_delete',
                                                                        'id' => 'admin_groups_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->admin_groups_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{trans('Agencies')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'agencies_show',
                                                                        'id' => 'agencies_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->agencies_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'agencies_add',
                                                                        'id' => 'agencies_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->agencies_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'agencies_edit',
                                                                        'id' => 'agencies_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                      'checked' => $item->agencies_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'agencies_delete',
                                                                        'id' => 'agencies_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->agencies_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{trans('Brokers')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'brokers_show',
                                                                        'id' => 'brokers_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->brokers_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'brokers_add',
                                                                        'id' => 'brokers_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->brokers_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'brokers_edit',
                                                                        'id' => 'brokers_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                      'checked' => $item->brokers_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'brokers_delete',
                                                                        'id' => 'brokers_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->brokers_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{trans('Skills')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'skills_show',
                                                                        'id' => 'skills_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->skills_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'skills_add',
                                                                        'id' => 'skills_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->skills_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'skills_edit',
                                                                        'id' => 'skills_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->skills_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'skills_delete',
                                                                        'id' => 'skills_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->skills_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{trans('Nannies')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'nannies_show',
                                                                        'id' => 'nannies_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->nannies_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'nannies_add',
                                                                        'id' => 'nannies_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->nannies_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'nannies_edit',
                                                                        'id' => 'nannies_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                        'checked' => $item->nannies_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'nannies_delete',
                                                                        'id' => 'nannies_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->nannies_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{trans('web.contact')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_show',
                                                                        'id' => 'contact_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->contact_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_add',
                                                                        'id' => 'contact_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->contact_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_edit',
                                                                        'id' => 'contact_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->contact_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'contact_delete',
                                                                        'id' => 'contact_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->contact_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{trans('About')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'about_show',
                                                                        'id' => 'about_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->about_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'about_add',
                                                                        'id' => 'about_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->about_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'about_edit',
                                                                        'id' => 'about_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->about_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'about_delete',
                                                                        'id' => 'about_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->about_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{trans('Terms And Conditions')}}</td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'terms_show',
                                                                        'id' => 'terms_show',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->terms_show == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'terms_add',
                                                                        'id' => 'terms_add',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->terms_add == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'terms_edit',
                                                                        'id' => 'terms_edit',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->terms_edit == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>

                                                                <td>
                                                                    @include('admin.components.inputs.check', [
                                                                        'name' => 'terms_delete',
                                                                        'id' => 'terms_delete',
                                                                        'value' => '1',
                                                                        'label' => '',
                                                                         'checked' => $item->terms_delete == '1' ? true : false,
                                                                        'disabled' => false,
                                                                        ])
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
@stop
