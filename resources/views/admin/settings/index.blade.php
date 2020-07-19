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
             @include('admin.layout.panels.breadcrumb', ['pageName' => 'Site Settings' ,'items'=>[
            [
            'name'=>'',
            'url'=>'',
            ]
            ]
            ])

            <div class="content-body">
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{url()->current()}}" method="post" class="steps-validation wizard-circle" enctype="multipart/form-data">
                                        @csrf
                                            <h6><i class="step-icon feather icon-info"></i>Site Information</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                          'name' => 'title',
                                                          'id' => 'title',
                                                          'type' => 'text',
                                                          'class' => 'title',
                                                          'value' => $settings->title,
                                                          'label' => 'Title',
                                                          'icon' =>'fa fa-sort-alpha-asc',
                                                          'placeholder' => 'Title',
                                                          'disabled' => false,
                                                          'required' => true,
                                                          ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'fullName',
                                                        'id' => 'fullName',
                                                        'type' => 'text',
                                                        'class' => 'fullName',
                                                        'value' => $settings->fullName,
                                                        'label' => 'Full Name',
                                                        'icon' =>'fa fa-sort-alpha-asc',
                                                        'placeholder' => 'Full Name',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'address',
                                                       'id' => 'address',
                                                       'type' => 'text',
                                                       'class' => 'address',
                                                       'value' => $settings->address,
                                                       'label' => 'Address',
                                                       'icon' =>'feather icon-type',
                                                       'placeholder' => 'Address',
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                          'name' => 'mail',
                                                          'id' => 'mail',
                                                          'type' => 'email',
                                                          'class' => 'mail',
                                                          'value' => $settings->mail,
                                                          'label' => 'Site Email',
                                                          'icon' =>'feather icon-mail',
                                                          'placeholder' => 'Site Email',
                                                          'disabled' => false,
                                                          'required' => true,
                                                          ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                         'name' => 'mobileNumber',
                                                         'id' => 'mobileNumber',
                                                         'type' => 'number',
                                                         'class' => 'mobileNumber',
                                                         'value' => $settings->mobileNumber,
                                                         'label' => 'Site Mobile Number',
                                                         'icon' =>'fa fa-sort-numeric-asc',
                                                         'placeholder' => 'Site Mobile Number',
                                                         'disabled' => false,
                                                         'required' => true,
                                                         ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                         'name' => 'fax',
                                                         'id' => 'fax',
                                                         'type' => 'number',
                                                         'class' => 'fax',
                                                         'value' => $settings->fax,
                                                         'label' => 'Site Fax',
                                                         'icon' =>'fa fa-fax',
                                                         'placeholder' => 'Site Fax',
                                                         'disabled' => false,
                                                         'required' => true,
                                                         ])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h6><i class="step-icon feather icon-github"></i>Site Social Media</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'twitterUrl',
                                                        'id' => 'twitterUrl',
                                                        'type' => 'url',
                                                        'class' => 'twitterUrl',
                                                        'value' => $settings->twitterUrl,
                                                        'label' => 'Twitter Url',
                                                        'icon' =>'feather icon-twitter',
                                                        'placeholder' => 'Twitter Url',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'linkedInUrl',
                                                       'id' => 'linkedInUrl',
                                                       'type' => 'url',
                                                       'class' => 'linkedInUrl',
                                                       'value' => $settings->linkedInUrl,
                                                       'label' => 'LinkedIn Url',
                                                       'icon' =>'fa fa-linkedin',
                                                       'placeholder' => 'LinkedIn Url',
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'instagramUrl',
                                                       'id' => 'instagramUrl',
                                                       'type' => 'url',
                                                       'class' => 'instagramUrl',
                                                       'value' => $settings->instagramUrl,
                                                       'label' => 'Instagram Url',
                                                       'icon' =>'feather icon-instagram',
                                                       'placeholder' => 'Instagram Url',
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'facebookUrl',
                                                       'id' => 'facebookUrl',
                                                       'type' => 'url',
                                                       'class' => 'facebookUrl',
                                                       'value' => $settings->facebookUrl,
                                                       'label' => 'FaceBook Url',
                                                       'icon' =>'feather icon-facebook',
                                                       'placeholder' =>  'FaceBook Url',
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'gitHupUrl',
                                                        'id' => 'gitHupUrl',
                                                        'type' => 'url',
                                                        'class' => 'gitHupUrl',
                                                        'value' => $settings->gitHupUrl,
                                                        'label' =>  'GitHup Url',
                                                        'icon' =>'feather icon-github',
                                                        'placeholder' => 'GitHup Url',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'youtubeUrl',
                                                        'id' => 'youtubeUrl',
                                                        'type' => 'url',
                                                        'class' => 'youtubeUrl',
                                                        'value' => $settings->youtubeUrl,
                                                        'label' => 'Youtube Url',
                                                        'icon' =>'fa fa-youtube',
                                                        'placeholder' => 'Youtube Url',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h6><i class="step-icon  fa fa-slideshare"></i>Site Identity</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @include('admin.components.uploud.file', ['name' =>'logo','label'=>'Logo','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>$settings->main_logo])
                                                    </div>
                                                    <div class="col-md-6">
                                                        @include('admin.components.uploud.file', ['name' =>'icon','label'=>'Icon','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>$settings->main_icon])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h6><i class="step-icon feather icon-image"></i> Site SEO</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.components.inputs.textarea', [
                                                      'name' => 'keyWords',
                                                      'id' => 'keyWords',
                                                      'type' => 'text',
                                                      'class' => '',
                                                      'value' => $settings->keyWords,
                                                      'label' => 'KeyWords',
                                                      'icon' =>'icon-phone',
                                                      'placeholder' => 'KeyWords',
                                                      'disabled' => false,
                                                      ])
                                                    </div>
                                                </div>
                                                <div class="divider divider-text"></div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.components.inputs.textarea', [
                                                      'name' => 'description',
                                                      'id' => 'description',
                                                      'type' => 'text',
                                                      'class' => '',
                                                      'value' => $settings->description,
                                                      'label' => 'Description',
                                                      'icon' =>'icon-phone',
                                                      'placeholder' => 'Description',
                                                      'disabled' => false,
                                                      ])
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="divider divider-text"></div>
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
