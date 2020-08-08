@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'Add Cv'])

        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="basicInformation">
                                <p class="h5">Basic Information</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2 text-center">
                                            {{--  <div class="file-upload" data-input-name="input1"></div>  --}}
                                            <span class="star">*</span>
                                            @include('site.components.uploud.file', ['name' =>'main_image','label'=>'Main Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
                                            <p class="addPhoto">Add Photo</p>

                                            <div class="fess">
                                                <p><span class="star">* </span>Specify Here the commission & fees you demand for this candidate Air ticket should not include</p>
                                                <label></label>
                                                @include('site.components.inputs.text', [
                                                    'name' => 'fees',
                                                    'id' => '',
                                                    'type' => 'text',
                                                    'class' => 'usd',
                                                    'value' => '',
                                                    'label' => ' USD currency',
                                                    'placeholder' => '$ 00.00',
                                                    'required' => true,
                                                    ])
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="formCv">
                                                <div class="container p-0 pl-md-3 pr-md-3">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'first_name',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => '',
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
                                                            'value' => '',
                                                            'label' => ' Last Name',
                                                            'placeholder' => 'Your Last Name',
                                                            'required' => true,
                                                            ])
                                                        </div>


                                                        <div class="col-lg-6">
                                                            <label><span class="star">*</span> Country</label>
                                                            <select class="form-control selectpicker mb-2" data-live-search="true" id="country_id" name="country_id" required>
                                                                <option selected disabled >Choose Country</option>
                                                                @foreach(\App\Model\Country::all() as $country)
                                                                    <option value="{{$country->id}}" @if ( old('country_id') == $country->id ) {{ 'selected' }} @endif>{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'city',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => '',
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
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => '',
                                                            'label' => 'Age',
                                                            'placeholder' => 'Your Age',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            <label class="mt-0 mt-lg-0">Religion</label>
                                                            <select name="religion" class="selectpicker form-control" required>
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Muslim" @if (old('religion') == "Muslim") {{ 'selected' }} @endif>Muslim</option>
                                                                <option value="Christian" @if (old('religion') == "Christian") {{ 'selected' }} @endif>Christian</option>
                                                                <option value="Any" @if (old('religion') == "Any") {{ 'selected' }} @endif>Any</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            <label>Marital Status</label>
                                                            <select name="marital_status" class="selectpicker form-control" required>
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Married" @if (old('marital_status') == "Married") {{ 'selected' }} @endif>Married</option>
                                                                <option value="Single" @if (old('marital_status') == "Single") {{ 'selected' }} @endif>Single</option>
                                                                <option value="Any" @if (old('marital_status') == "Any") {{ 'selected' }} @endif>Any</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'children',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => '',
                                                            'label' => 'Children',
                                                            'placeholder' => 'Your Children',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label><span class="star">*</span> Job</label>
                                                            <select name="job_id" class="selectpicker form-control" required>
                                                                <option selected disabled >Select Job</option>
                                                                @foreach(\App\Model\Job::all() as $job)
                                                                <option value="{{ $job->id }}" @if (old('job_id') == $job->id) {{ 'selected' }} @endif>{{ $job->title }}</option>                                                                @endforeach
                                                            </select>
                                                        </div>



                                                        <div class="col-lg-6">
                                                            <span class="star">*</span>
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'salary',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => '',
                                                            'label' => 'Salary',
                                                            'placeholder' => 'Salary',
                                                            'required' => true,
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label><span class="star">*</span> Experience</label>
                                                            </div>
                                                            <div class="fullName mb-2">
                                                                <input type="text" name="experience" value="{{ old('experience') }}" required class="first" placeholder="Number Of Years">
                                                                <input type="text" name="country_ex" value="{{ old('country_ex') }}" required class="last" placeholder="Country Of Experience">
                                                            </div>
                                                        </div>

                                                         <div class="col-lg-6">
                                                            <label><span class="star">*</span> Education</label>
                                                            <select name="education" class="selectpicker form-control" required>
                                                                <option selected disabled >Select education</option>
                                                                <option value="None" @if (old('education') == "None") {{ 'selected' }} @endif>None</option>
                                                                <option value="Primary" @if (old('education') == "Primary") {{ 'selected' }} @endif>Primary</option>
                                                                <option value="Secondary" @if (old('education') == "Secondary") {{ 'selected' }} @endif>Secondary</option>
                                                                <option value="College" @if (old('education') == "College") {{ 'selected' }} @endif>College</option>
                                                                <option value="Diploma" @if (old('education') == "Diploma") {{ 'selected' }} @endif>Diploma</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2"><span class="star">*</span> Height</label>
                                                            <input type="text" class="form-control mobile" value="{{old('height')}}"
                                                                placeholder="Your Height" name="height" required>
                                                            <span class="editMobile">cm</span>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2"><span class="star">*</span> Weight</label>
                                                            <input type="text" class="form-control mobile" value="{{old('weight')}}"
                                                                placeholder="Your Weight" name="weight" required>
                                                            <span class="editMobile">kg</span>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <label class="mt-2 mt-lg-2"><span class="star">*</span> Language :</label>
                                                            <div class="row">
                                                                <div class="col-6 col-lg-6 mb-3">
                                                                    <label>Arabic</label>
                                                                    <select name="arabic_lang" class="selectpicker form-control" required>
                                                                        <option selected disabled >your level</option>
                                                                        <option value="None" @if (old('arabic_lang') == "None") {{ 'selected' }} @endif>None</option>
                                                                        <option value="Good" @if (old('arabic_lang') == "Good") {{ 'selected' }} @endif>Good</option>
                                                                        <option value="Excellent" @if (old('arabic_lang') == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                        <option value="Fluent" @if (old('arabic_lang') == "Fluent") {{ 'selected' }} @endif>Fluent</option>
                                                                        <option value="Mother tongue" @if (old('arabic_lang') == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 col-lg-6">
                                                                    <label>English</label>
                                                                    <select name="english_lang" class="selectpicker form-control" required>
                                                                        <option selected disabled >your level</option>
                                                                        <option value="None" @if (old('english_lang') == "None") {{ 'selected' }} @endif>None</option>
                                                                        <option value="Good" @if (old('english_lang') == "Good") {{ 'selected' }} @endif>Good</option>
                                                                        <option value="Excellent" @if (old('english_lang') == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                        <option value="Fluent" @if (old('english_lang') == "Fluent") {{ 'selected' }} @endif>Fluent</option>
                                                                        <option value="Mother tongue" @if (old('english_lang') == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
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
                                        <p class="upfilecv">Medical Test</p>
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
                                    'value' => '',
                                    'label' => 'About Nanny (150 words only)',
                                    'placeholder' => 'Write here…',
                                    'maxlength' => '150',
                                    'required' => true,
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
                                                    <input type="checkbox" class="custom-control-input" id="{{ $item->skill }}"
                                                        name="skills[]"  value="{{ $item->skill }}"
                                                        {{ (is_array(old('skills')) && in_array( $item->skill, old('skills'))) ? ' checked' : '' }}>
                                                    <label class="custom-control-label" for="{{ $item->skill }}"> {{ $item->skill }} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basicInformation text-center text-lg-left">
                                <p class="h5">Gallery</p>
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
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-primary float-right pl-5 pr-5">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>
@stop
