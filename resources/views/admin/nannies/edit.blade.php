@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
            {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
            {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}">
        </div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Edit Nanny' .' : '.$nanny->name ,'items'=>[
            [
            'name'=>'Nanny',
            'url'=>url('/admin/nannies'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{ 'Edit Nanny : ' . $nanny->name}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-6 mb-1">
                                                        @include('admin.components.uploud.file', ['name' =>'main_image','label'=>'Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage' . $nanny->main_image)])
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                @include('site.components.inputs.text', [
                                                                    'name' => 'first_name',
                                                                    'id' => '',
                                                                    'type' => 'text',
                                                                    'class' => '',
                                                                    'value' => $nanny->first_name,
                                                                    'label' => 'First Name',
                                                                    'placeholder' => 'Your First Name',
                                                                    'disabled' => false,
                                                                    ])
                                                            </div>

                                                            <div class="col-6">
                                                                @include('site.components.inputs.text', [
                                                                    'name' => 'last_name',
                                                                    'id' => '',
                                                                    'type' => 'text',
                                                                    'class' => '',
                                                                    'value' =>  $nanny->last_name,
                                                                    'label' => 'Last Name',
                                                                    'placeholder' => 'Your Last Name',
                                                                    ])
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12 mb-1">
                                                        <label>Country</label>
                                                        <select class="form-control selectpicker" data-live-search="true" id="country_id" name="country_id">
                                                            <option selected disabled >Choose Country</option>
                                                            @foreach(\App\Model\Country::all() as $country)
                                                                <option value="{{$country->id}}"
                                                                    @if ( $nanny->country_id == $country->id ) {{ 'selected' }} @endif>{{$country->name}}</option>                                                                @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        @include('site.components.inputs.text', [
                                                            'name' => 'city',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $nanny->city,
                                                            'label' => 'City',
                                                            'placeholder' => 'Your City',
                                                            ])
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        @include('site.components.inputs.text', [
                                                            'name' => 'age',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' =>  $nanny->age,
                                                            'label' => 'Age',
                                                            'placeholder' => 'Your Age',
                                                            ])
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="mt-0 mt-lg-0">Religion</label>
                                                        <select name="religion" class="selectpicker form-control">
                                                            <option selected disabled >Select Religion</option>
                                                            <option value="Muslim" @if ($nanny->religion == "Muslim") {{ 'selected' }} @endif>Muslim</option>
                                                            <option value="Christian" @if ($nanny->religion == "Christian") {{ 'selected' }} @endif>Christian</option>
                                                            <option value="Any" @if ($nanny->religion == "Any") {{ 'selected' }} @endif>Any</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                          @include('site.components.inputs.text', [
                                                            'name' => 'children',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => $nanny->children,
                                                            'label' => 'Children',
                                                            'placeholder' => 'Your Children',
                                                            ])
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label>Job</label>
                                                        <select name="job_id" class="selectpicker form-control">
                                                            <option selected disabled >Select Job</option>
                                                            @foreach(\App\Model\Job::all() as $job)
                                                            <option value="{{ $job->id }}" @if ($nanny->job_id == $job->id) {{ 'selected' }} @endif>{{ $job->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="col-6 mb-1">
                                                        @include('site.components.inputs.text', [
                                                            'name' => 'salary',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => $nanny->salary,
                                                            'label' => 'Salary',
                                                            'placeholder' => 'Salary',
                                                            ])
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        @include('site.components.inputs.text', [
                                                            'name' => 'experience',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => $nanny->experience,
                                                            'label' => 'Experience',
                                                            'placeholder' => 'Number Of Years',
                                                            ])
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label>Marital Status</label>
                                                        <select name="marital_status" class="selectpicker form-control">
                                                            <option selected disabled >Select Religion</option>
                                                            <option value="Married" @if ($nanny->marital_status == "Married") {{ 'selected' }} @endif>Married</option>
                                                            <option value="Single" @if ($nanny->marital_status == "Single") {{ 'selected' }} @endif>Single</option>
                                                            <option value="Any" @if ($nanny->marital_status == "Any") {{ 'selected' }} @endif>Any</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label>Height</label>
                                                        <input type="number" class="form-control mobile"
                                                         value="{{isset($nanny->height) && $nanny->height != '' ? $nanny->height : old('height')}}"
                                                         placeholder="Your Height" name="height">
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label>Weight</label>
                                                        <input type="number" class="form-control mobile"
                                                        value="{{isset($nanny->weight) && $nanny->weight != '' ? $nanny->weight : old('weight')}}"
                                                        placeholder="Your Weight" name="weight">
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label>Language :</label>
                                                        <div class="row">
                                                            <div class="col-6 col-lg-6">
                                                                <label>Arabic</label>
                                                                <select name="arabic_lang" class="selectpicker form-control">
                                                                    <option selected disabled >your level</option>
                                                                    <option value="Mother tongue" @if ($nanny->arabic_lang == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                    <option value="Good" @if ($nanny->arabic_lang == "Good") {{ 'selected' }} @endif>Good</option>
                                                                    <option value="Excellent" @if ($nanny->arabic_lang == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                    <option value="Fluent" @if ($nanny->arabic_lang == "Fluent") {{ 'selected' }} @endif>Fluent</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-6 col-lg-6">
                                                                <label>English</label>
                                                                <select name="english_lang" class="selectpicker form-control">
                                                                    <option selected disabled >your level</option>
                                                                    <option value="Mother tongue" @if ($nanny->english_lang == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                    <option value="Good" @if ($nanny->english_lang == "Good") {{ 'selected' }} @endif>Good</option>
                                                                    <option value="Excellent" @if ($nanny->english_lang == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                    <option value="Fluent" @if ($nanny->english_lang == "Fluent") {{ 'selected' }} @endif>Fluent</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        @include('site.components.inputs.textarea', [
                                                            'name' => 'about',
                                                            'id'   => '',
                                                            'class' => 'mt-1',
                                                            'value' => $nanny->about,
                                                            'label' => 'About Nanny (50 words only)',
                                                            'placeholder' => 'Write here…',
                                                            'maxlength' => '150',
                                                            ])
                                                    </div>

                                                    <div class="col-12 ml-2 mt-2">
                                                        <div class="row">
                                                            @foreach ($skills as $item)
                                                            <div class="col-4 col-lg-3 mb-1 custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="{{$item->skill}}"
                                                                    name="skills[]"  value="{{$item->skill}}"
                                                                    {{ (is_array(old('skills')) && in_array( $item->skill, old('skills'))) || in_array( $item->skill, $arrSkill) ? ' checked' : '' }} >
                                                                <label class="custom-control-label" for="{{$item->skill}}">{{$item->skill}}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="text-center text-lg-left">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label for="gallery" class="upload-photo mb-1">
                                                                        <img src="{{url('design/site/images/photo-camera.png')}}" alt="camera">
                                                                    </label>
                                                                    <input type="file" name="gallery[]" id="gallery" class="form-control attach"
                                                                    multiple data-jpreview-container="#preview_gallery">
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <!-- image preview -->
                                                                    <div id="preview_gallery" class="jpreview-container"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach ($arrGallery as $image)
                                                        <div class="d-inline ml-1">
                                                            {{--  <a href="">X</a>  --}}
                                                            <img src="{{ url( 'gallery/' . $image) }}" alt="camera" style="width:75px;height:75px;margin:3px;border-radius:16px">
                                                        </div>
                                                        @endforeach
                                                    </div>


                                                    <div class="col-12 mt-1">
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
