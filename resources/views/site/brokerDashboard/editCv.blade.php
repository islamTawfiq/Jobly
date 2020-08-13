@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'Edit Cv'])

        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{str_replace('/edit','',url()->current())}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="basicInformation">
                                <p class="h5">Basic Information</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2 text-center">
                                            {{--  <div class="file-upload" data-input-name="input1"></div>  --}}
                                            @include('site.components.uploud.file', ['name' =>'main_image','label'=>'Main Image','max'=>'5','accept'=>'image/*' , 'disabled' => false,'value'=>url('storage' . $nanny->main_image)])
                                            <p class="addPhoto">Add Photo</p>

                                            <div class="fess">
                                                <p><span class="star">* </span>Specify Here the commission & fees you demand for this candidate Air ticket should not include</p>
                                                <label></label>
                                                @include('site.components.inputs.text', [
                                                    'name' => 'fees',
                                                    'id' => '',
                                                    'type' => 'number',
                                                    'class' => 'usd',
                                                    'value' => $nanny->fees,
                                                    'label' => ' USD currency',
                                                    'placeholder' => '$ 00.00',
                                                    'required' => true,
                                                    ])
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="formCv">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'first_name',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $nanny->first_name,
                                                            'label' => ' First Name',
                                                            'placeholder' => 'Your First Name',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'last_name',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $nanny->last_name,
                                                            'label' => ' Last Name',
                                                            'placeholder' => 'Your Last Name',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label><span class="star">*</span> Country</label>
                                                            <select class="form-control selectpicker mb-2" data-live-search="true" id="country_id" name="country_id">
                                                                <option selected disabled >Choose Country</option>
                                                                @foreach(\App\Model\Country::all() as $country)
                                                                    <option value="{{$country->id}}"
                                                                        @if ( $nanny->country_id == $country->id ) {{ 'selected' }} @endif>{{$country->name}}</option>                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'city',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $nanny->city,
                                                            'label' => ' City',
                                                            'placeholder' => 'Your City',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'age',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' =>  $nanny->age,
                                                            'label' => 'Age',
                                                            'placeholder' => 'Your Age',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            <label class="mt-0 mt-lg-0">Religion</label>
                                                            <select name="religion" class="selectpicker form-control">
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Muslim" @if ($nanny->religion == "Muslim") {{ 'selected' }} @endif>Muslim</option>
                                                                <option value="Christian" @if ($nanny->religion == "Christian") {{ 'selected' }} @endif>Christian</option>
                                                                <option value="Any" @if ($nanny->religion == "Any") {{ 'selected' }} @endif>Any</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2"><span class="star">*</span> Height</label>
                                                            <input type="number" step=any class="form-control mobile"
                                                             value="{{isset($nanny->height) && $nanny->height != '' ? $nanny->height : old('height')}}"
                                                             placeholder="Your Height" name="height">
                                                            <span class="editMobile">cm</span>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2"><span class="star">*</span> Weight</label>
                                                            <input type="number" step=any class="form-control mobile"
                                                            value="{{isset($nanny->weight) && $nanny->weight != '' ? $nanny->weight : old('weight')}}"
                                                            placeholder="Your Weight" name="weight">
                                                            <span class="editMobile">kg</span>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            <label>Marital Status</label>
                                                            <select name="marital_status" class="selectpicker form-control">
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Married" @if ($nanny->marital_status == "Married") {{ 'selected' }} @endif>Married</option>
                                                                <option value="Single" @if ($nanny->marital_status == "Single") {{ 'selected' }} @endif>Single</option>
                                                                <option value="Any" @if ($nanny->marital_status == "Any") {{ 'selected' }} @endif>Any</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
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

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'mobile',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => $nanny->mobile,
                                                            'label' => 'Candidate Active Mobile Number : ( for interview )',
                                                            'placeholder' => 'Mobile Number',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label><span class="star">*</span> Education</label>
                                                            <select name="education" class="selectpicker form-control" required>
                                                                <option selected disabled >Select education</option>
                                                                <option value="None" @if ($nanny->education == "None") {{ 'selected' }} @endif>None</option>
                                                                <option value="Primary" @if ($nanny->education == "Primary") {{ 'selected' }} @endif>Primary</option>
                                                                <option value="Secondary" @if ($nanny->education == "Secondary") {{ 'selected' }} @endif>Secondary</option>
                                                                <option value="College" @if ($nanny->education == "College") {{ 'selected' }} @endif>College</option>
                                                                <option value="Diploma" @if ($nanny->education == "Diploma") {{ 'selected' }} @endif>Diploma</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label><span class="star">*</span> Job</label>                                                            <select name="job_id" class="selectpicker form-control">
                                                                <option selected disabled >Select Job</option>
                                                                @foreach(\App\Model\Job::all() as $job)
                                                                <option value="{{ $job->id }}" @if ($nanny->job_id == $job->id) {{ 'selected' }} @endif>{{ $job->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'salary',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => $nanny->salary,
                                                            'label' => 'Salary',
                                                            'placeholder' => 'Salary',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label><span class="star">*</span> Experience</label>
                                                            </div>
                                                            <div class="col-12 col-lg-12 custom-control custom-checkbox">
                                                                @include('site.components.inputs.check', [
                                                                    'name' => 'noneExperience',
                                                                    'id' => 'none',
                                                                    'class' => '',
                                                                    'value' => 1,
                                                                    'label' =>  'None',
                                                                    'checked' => $nanny->noneExperience,
                                                                    'required' => false,
                                                                ])
                                                            </div>
                                                            <div class="fullName mb-2">
                                                                <select name="country_ex1" class="first" required>
                                                                    <option selected disabled >Select Country</option>
                                                                    <option value="Oman" @if ($nanny->country_ex1 == "Oman") {{ 'selected' }} @endif>Oman</option>
                                                                    <option value="Qatar" @if ($nanny->country_ex1 == "Qatar") {{ 'selected' }} @endif>Qatar</option>
                                                                    <option value="Saudi Arabia" @if ($nanny->country_ex1 == "Saudi Arabia") {{ 'selected' }} @endif>Saudi Arabia</option>
                                                                    <option value="UAE" @if ($nanny->country_ex1 == "UAE") {{ 'selected' }} @endif>UAE</option>
                                                                    <option value="Kuwait" @if ($nanny->country_ex1 == "Kuwait") {{ 'selected' }} @endif>Kuwait</option>
                                                                    <option value="Bahrain" @if ($nanny->country_ex1 == "Bahrain") {{ 'selected' }} @endif>Bahrain</option>
                                                                    <option value="Lebanon" @if ($nanny->country_ex1 == "Lebanon") {{ 'selected' }} @endif>Lebanon</option>
                                                                    <option value="Jordan" @if ($nanny->country_ex1 == "Jordan") {{ 'selected' }} @endif>Jordan</option>
                                                                    <option value="Other" @if ($nanny->country_ex1 == "Other") {{ 'selected' }} @endif>Other</option>
                                                                </select>
                                                                <input type="number" step=any name="experience1" value="{{ $nanny->experience1 }}" class="last" placeholder="Years / Months">
                                                            </div>
                                                            <div class="fullName mb-2">
                                                                <select name="country_ex2" class="first" required>
                                                                    <option selected disabled >Select Country</option>
                                                                    <option value="Oman" @if ($nanny->country_ex2 == "Oman") {{ 'selected' }} @endif>Oman</option>
                                                                    <option value="Qatar" @if ($nanny->country_ex2 == "Qatar") {{ 'selected' }} @endif>Qatar</option>
                                                                    <option value="Saudi Arabia" @if ($nanny->country_ex2 == "Saudi Arabia") {{ 'selected' }} @endif>Saudi Arabia</option>
                                                                    <option value="UAE" @if ($nanny->country_ex2 == "UAE") {{ 'selected' }} @endif>UAE</option>
                                                                    <option value="Kuwait" @if ($nanny->country_ex2 == "Kuwait") {{ 'selected' }} @endif>Kuwait</option>
                                                                    <option value="Bahrain" @if ($nanny->country_ex2 == "Bahrain") {{ 'selected' }} @endif>Bahrain</option>
                                                                    <option value="Lebanon" @if ($nanny->country_ex2 == "Lebanon") {{ 'selected' }} @endif>Lebanon</option>
                                                                    <option value="Jordan" @if ($nanny->country_ex2 == "Jordan") {{ 'selected' }} @endif>Jordan</option>
                                                                    <option value="Other" @if ($nanny->country_ex2 == "Other") {{ 'selected' }} @endif>Other</option>
                                                                </select>
                                                                <input type="number" step=any name="experience2" value="{{ $nanny->experience2 }}" class="last" placeholder="Years / Months">
                                                            </div>
                                                            <div class="fullName mb-2">
                                                                <select name="country_ex3" class="first" required>
                                                                    <option selected disabled >Select Country</option>
                                                                    <option value="Oman" @if ($nanny->country_ex3 == "Oman") {{ 'selected' }} @endif>Oman</option>
                                                                    <option value="Qatar" @if ($nanny->country_ex3 == "Qatar") {{ 'selected' }} @endif>Qatar</option>
                                                                    <option value="Saudi Arabia" @if ($nanny->country_ex3 == "Saudi Arabia") {{ 'selected' }} @endif>Saudi Arabia</option>
                                                                    <option value="UAE" @if ($nanny->country_ex3 == "UAE") {{ 'selected' }} @endif>UAE</option>
                                                                    <option value="Kuwait" @if ($nanny->country_ex3 == "Kuwait") {{ 'selected' }} @endif>Kuwait</option>
                                                                    <option value="Bahrain" @if ($nanny->country_ex3 == "Bahrain") {{ 'selected' }} @endif>Bahrain</option>
                                                                    <option value="Lebanon" @if ($nanny->country_ex3 == "Lebanon") {{ 'selected' }} @endif>Lebanon</option>
                                                                    <option value="Jordan" @if ($nanny->country_ex3 == "Jordan") {{ 'selected' }} @endif>Jordan</option>
                                                                    <option value="Other" @if ($nanny->country_ex3 == "Other") {{ 'selected' }} @endif>Other</option>
                                                                </select>
                                                                <input type="number" step=any name="experience3" value="{{ $nanny->experience3 }}" class="last" placeholder="Years / Months">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <label class="mt-2 mt-lg-2"><span class="star">*</span> Language :</label>
                                                            <div class="row">
                                                                <div class="col-6 col-lg-6 mb-3">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basicInformation p-3 pr-5">

                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-md-4">
                                        <p class="upfilecv">Documents</p>
                                        <div class="center medical">
                                            <h5 class="imgupload"><i class="fa fa-file-image-o"></i></h5>
                                            <h5 class="imgupload ok"><i class="fa fa-check"></i></h5>
                                            <h5 class="imgupload stop"><i class="fa fa-times"></i></h5>
                                            <p id="namefile">this document appear in CV download</p>
                                            <button type="button" id="btnup2" class="btn btn-primary">Upload</button>
                                            <input type="file" value="" name="medical" id="fileup">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="upfilecv"><span class="star">*</span> Passpor Copy</p>
                                        <div class="center passport">
                                            <h5 class="imgupload2"><i class="fa fa-file-image-o"></i></h5>
                                            <h5 class="imgupload2 ok2"><i class="fa fa-check"></i></h5>
                                            <h5 class="imgupload2 stop2"><i class="fa fa-times"></i></h5>
                                            <p id="namefile2">this document appear in CV download</p>
                                            <button type="button" id="btnup2" class="btn btn-primary">Upload</button>
                                            <input type="file" value="" name="passport" id="fileup2">
                                        </div>
                                    </div>

                                </div>
                                <div>
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
                            </div>
                            <div class="basicInformation">
                                <p class="h5"><span class="star">*</span> Skills</p>
                                <div class="skills pl-lg-5">
                                    <div class="container">
                                        <div class="row">

                                            @foreach ($skills as $item)
                                                <div class="col-4 col-lg-3 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{$item->skill}}"
                                                        name="skills[]"  value="{{$item->skill}}"
                                                        {{ (is_array(old('skills')) && in_array( $item->skill, old('skills'))) || in_array( $item->skill, $arrSkill) ? ' checked' : '' }} >
                                                    <label class="custom-control-label" for="{{$item->skill}}">{{$item->skill}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basicInformation text-center text-lg-left">
                                <p class="h5 d-block">Gallery <span style="font-size: 15px">(At least one full body picture)</span></p>
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <label for="gallery" class="upload-photo mb-2">
                                                <img src="{{url('design/site/images/photo-camera.png')}}" alt="camera">
                                            </label>
                                            <input type="file" name="gallery[]" id="gallery" class="form-control attach"
                                            multiple data-jpreview-container="#preview_gallery">
                                        </div>
                                        <div class="col-lg-11">
                                            <!-- image preview -->
                                            <div id="preview_gallery" class="jpreview-container"></div>
                                        </div>
                                    </div>
                                </div>
                                @if ($nanny->gallery != null)
                                @foreach ($arrGallery as $image)
                                <div class="d-inline ml-3">
                                    {{--  <a href="">X</a>  --}}
                                    <img src="{{ url( 'gallery/' . $image) }}" alt="camera" style="width:100px;height:100px;margin:5px;border-radius:16px">
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-primary float-right pl-5 pr-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
