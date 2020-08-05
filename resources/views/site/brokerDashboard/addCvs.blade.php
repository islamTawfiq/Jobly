@extends('site.layout.dashboard')
{{--  @section('page_js')
<script>
    $(document).ready(function () {
        $('#country_id').change(function () {
            var country_id = $(this).val();
            if (country_id) {
                $.ajax({
                    type: "GET",
                    url: "{{url('countries/getStates')}}?country_id=" + country_id,
                    success: function (res) {
                        if (res) {
                            $("#city_id").empty();
                            $("#city_id").append('<option selected disabled >Choose City</option>');
                            $.each(res, function (key, value) {
                                $("#city_id").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#city_id").empty();
                        }
                    }
                });
            } else {
                $("#city_id").empty();
            }
        });
    });
</script>
@stop  --}}
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
                                            @include('site.components.uploud.file', ['name' =>'main_image','label'=>'Main Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
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
                                                            'value' => '',
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
                                                            'value' => '',
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
                                                            'value' => '',
                                                            'label' => 'Mobile Number',
                                                            'placeholder' => 'Your Mobile Number',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>Country</label>
                                                            <select class="form-control selectpicker mb-2" data-live-search="true" id="country_id" name="country_id">
                                                                <option selected disabled >Choose Country</option>
                                                                @foreach(\App\Model\Country::all() as $country)
                                                                    <option value="{{$country->id}}" @if ( old('country_id') == $country->id ) {{ 'selected' }} @endif>{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            {{--  <select class="form-control" id="city_id" name="city_id">
                                                                <option selected disabled >Choose City</option>
                                                            </select>  --}}
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'city',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => '',
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
                                                            'value' => '',
                                                            'label' => 'Age',
                                                            'placeholder' => 'Your Age',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="mt-0 mt-lg-0">Religion</label>
                                                            <select name="religion" class="selectpicker form-control">
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Muslim" @if (old('religion') == "Muslim") {{ 'selected' }} @endif>Muslim</option>
                                                                <option value="Christian" @if (old('religion') == "Christian") {{ 'selected' }} @endif>Christian</option>
                                                                <option value="Any" @if (old('religion') == "Any") {{ 'selected' }} @endif>Any</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'children',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => '',
                                                            'label' => 'Children',
                                                            'placeholder' => 'Your Children',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>Job</label>
                                                            <select name="job_id" class="selectpicker form-control">
                                                                <option selected disabled >Select Job</option>
                                                                @foreach(\App\Model\Job::all() as $job)
                                                                <option value="{{ $job->id }}" @if (old('job_id') == $job->id) {{ 'selected' }} @endif>{{ $job->title }}</option>                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'salary',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => '',
                                                            'label' => 'Salary',
                                                            'placeholder' => 'Salary',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            @include('site.components.inputs.text', [
                                                            'name' => 'experience',
                                                            'id' => '',
                                                            'type' => 'number',
                                                            'class' => '',
                                                            'value' => '',
                                                            'label' => 'Experience',
                                                            'placeholder' => 'Number Of Years',
                                                            ])
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label>Marital Status</label>
                                                            <select name="marital_status" class="selectpicker form-control">
                                                                <option selected disabled >Select Religion</option>
                                                                <option value="Married" @if (old('marital_status') == "Married") {{ 'selected' }} @endif>Married</option>
                                                                <option value="Single" @if (old('marital_status') == "Single") {{ 'selected' }} @endif>Single</option>
                                                                <option value="Any" @if (old('marital_status') == "Any") {{ 'selected' }} @endif>Any</option>
                                                            </select>
                                                        </div>

                                                        {{--  <div class="col-lg-4">
                                                            <label>Education</label>
                                                            <select name="education" class="selectpicker form-control">
                                                                <option selected disabled >Select education</option>
                                                                <option value="Bachelor's Degree" @if (old('education') == "Bachelor's Degree") {{ 'selected' }} @endif> Bachelor's Degree </option>
                                                                <option value="Master's Degree" @if (old('education') == "Master's Degree") {{ 'selected' }} @endif>Master's Degree</option>
                                                                <option value="Doctorate Degree" @if (old('education') == "Doctorate Degree") {{ 'selected' }} @endif>Doctorate Degree</option>
                                                                <option value="High School" @if (old('education') == "High School") {{ 'selected' }} @endif>High School</option>
                                                                <option value="Vocational" @if (old('education') == "Vocational") {{ 'selected' }} @endif>Vocational</option>
                                                                <option value="Diploma" @if (old('education') == "Diploma") {{ 'selected' }} @endif>Diploma</option>
                                                                <option value="None" @if (old('education') == "None") {{ 'selected' }} @endif>None</option>
                                                            </select>
                                                        </div>  --}}

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2">Height</label>
                                                            <input type="number" class="form-control mobile" value="{{old('height')}}"
                                                                placeholder="Your Height" name="height">
                                                            <span class="editMobile">cm</span>
                                                        </div>

                                                        <div class="col-lg-6 height">
                                                            <label class="mt-2 mt-lg-2">Weight</label>
                                                            <input type="number" class="form-control mobile" value="{{old('weight')}}"
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
                                                                        <option value="Mother tongue" @if (old('arabic_lang') == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                        <option value="Good" @if (old('arabic_lang') == "Good") {{ 'selected' }} @endif>Good</option>
                                                                        <option value="Excellent" @if (old('arabic_lang') == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                        <option value="Fluent" @if (old('arabic_lang') == "Fluent") {{ 'selected' }} @endif>Fluent</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 col-lg-6">
                                                                    <label>English</label>
                                                                    <select name="english_lang" class="selectpicker form-control">
                                                                        <option selected disabled >your level</option>
                                                                        <option value="Mother tongue" @if (old('english_lang') == "Mother tongue") {{ 'selected' }} @endif>Mother tongue</option>
                                                                        <option value="Good" @if (old('english_lang') == "Good") {{ 'selected' }} @endif>Good</option>
                                                                        <option value="Excellent" @if (old('english_lang') == "Excellent") {{ 'selected' }} @endif>Excellent</option>
                                                                        <option value="Fluent" @if (old('english_lang') == "Fluent") {{ 'selected' }} @endif>Fluent</option>
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
                                <div>
                                    @include('site.components.inputs.textarea', [
                                    'name' => 'about',
                                    'id'   => '',
                                    'class' => 'mt-1',
                                    'value' => '',
                                    'label' => 'About Nanny (150 words only)',
                                    'placeholder' => 'Write here…',
                                    'maxlength' => '150',
                                    ])
                                </div>
                            </div>
                            <div class="basicInformation">
                                <p class="h5">Skills</p>
                                <div class="skills pl-lg-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($skills as $item)
                                                <div class="col-4 col-lg-3 custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{ $item->skill }}"
                                                        name="skills[]"  value="{{ $item->skill }}"
                                                        {{ (is_array(old('skills')) && in_array( $item->skill, old('skills'))) ? ' checked' : '' }} >
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
