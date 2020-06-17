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
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="formCv">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
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
                                                        <div class="col-12">
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

                                                        <div class="col-12">
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'mobile',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => 'mobile',
                                                            'value' =>  $nanny->mobile,
                                                            'label' => 'Mobile Number',
                                                            'placeholder' => 'Your Mobile Number',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'country',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' =>  $nanny->country,
                                                            'label' => 'Country',
                                                            'placeholder' => 'Your Country',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'city',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' =>  $nanny->city,
                                                            'label' => 'City',
                                                            'placeholder' => 'Your City',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-4">
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

                                                        <div class="col-lg-4">
                                                            <label class="mt-0 mt-lg-0">Religion</label>
                                                            <select name="religion" class="selectpicker form-control">
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Muslim" @if (old('religion') or $nanny->religion == "Muslim") {{ 'selected' }} @endif>Muslim</option>
                                                                <option value="Christian" @if (old('religion') or $nanny->religion == "Christian") {{ 'selected' }} @endif>Christian</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4">
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
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'job',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $nanny->job,
                                                            'label' => 'Job',
                                                            'placeholder' => 'Your Job',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
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

                                                        <div class="col-lg-4">
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

                                                        <div class="col-lg-4">
                                                            <label>Marital Status</label>
                                                            <select name="marital_status" class="selectpicker form-control">
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Married" @if (old('marital_status') or $nanny->marital_status == "Married") {{ 'selected' }} @endif>Married</option>
                                                                <option value="Single" @if (old('marital_status') or $nanny->marital_status == "Single") {{ 'selected' }} @endif>Single</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label>Education</label>
                                                            <select name="education" class="selectpicker form-control">
                                                                <option selected disabled >select education</option>
                                                                <option value="High School" @if (old('education') or $nanny->education == "High School") {{ 'selected' }} @endif>High School</option>
                                                                <option value="Mid Level" @if (old('education') or $nanny->education == "Mid Level") {{ 'selected' }} @endif>Mid Level</option>
                                                                <option value="None" @if (old('education') or $nanny->education == "None") {{ 'selected' }} @endif>None</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2">Height</label>
                                                            <input type="number" class="form-control mobile"
                                                             value="{{isset($nanny->height) && $nanny->height != '' ? $nanny->height : old('height')}}"
                                                             placeholder="Your Height" name="height">
                                                            <span class="editMobile">cm</span>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2">Weight</label>
                                                            <input type="number" class="form-control mobile"
                                                            value="{{isset($nanny->weight) && $nanny->weight != '' ? $nanny->weight : old('weight')}}"
                                                            placeholder="Your Weight" name="weight">
                                                            <span class="editMobile">kg</span>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <label class="mt-2 mt-lg-2">Language :</label>
                                                            <div class="row">
                                                                <div class="col-6 col-lg-6 mb-3">
                                                                    <label>Arabic</label>
                                                                    <select name="arabic_lang" class="selectpicker form-control">
                                                                        <option selected disabled >your level</option>
                                                                        <option value="Mother tongue" @if (old('arabic_lang') or $nanny->arabic_lang == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                        <option value="Good" @if (old('arabic_lang') or $nanny->arabic_lang == "Good") {{ 'selected' }} @endif>Good</option>
                                                                        <option value="Excellent" @if (old('arabic_lang') or $nanny->arabic_lang == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                        <option value="Fluent" @if (old('arabic_lang') or $nanny->arabic_lang == "Fluent") {{ 'selected' }} @endif>Fluent</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 col-lg-6">
                                                                    <label>English</label>
                                                                    <select name="english_lang" class="selectpicker form-control">
                                                                        <option selected disabled >your level</option>
                                                                        <option value="Mother tongue" @if (old('english_lang') or $nanny->english_lang == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                        <option value="Good" @if (old('english_lang') or $nanny->english_lang == "Good") {{ 'selected' }} @endif>Good</option>
                                                                        <option value="Excellent" @if (old('english_lang') or $nanny->english_lang == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                        <option value="Fluent" @if (old('english_lang') or $nanny->english_lang == "Fluent") {{ 'selected' }} @endif>Fluent</option>
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
                                {{--  <div>
                                    <label class="mb-1">About me (25 words only)</label>
                                    <textarea class="form-control" placeholder="Write here…"></textarea>
                                </div>  --}}
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
                                <p class="h5">Skills ( 6 Max)</p>
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
                                <p cla  ss="h5">Gallery</p>
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
                                @foreach ($arrGallery as $image)
                                <div class="d-inline ml-3">
                                    {{--  <a href="">X</a>  --}}
                                    <img src="{{ url( 'gallery/' . $image) }}" alt="camera" style="width:100px;height:100px;margin:5px;border-radius:16px">
                                </div>
                                @endforeach
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
