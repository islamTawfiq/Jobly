    <!-- start top-menu -->
    <header class="homeBackground">
        <div class="container">
            <div class="row">

                @include('site.layout.navbars.navbar')

                <div class="col-12 col-lg-4">
                    <div class="gteNanny">
                        <p class="h3">Get Your Domestic Workers</p>
                        <div class="searchInNannies">
                            <?php $nanny = \App\Model\Nanny::all(); ?>
                            <p class="h5">Search & Hire Domestic Workers</p>
                            <hr>
                            <form action="{{url('/filter')}}" method="post" class="formCv">
                                @csrf
                                <div class="mb-lg-3 mb-2">
                                    <select class="form-control selectpicker" data-live-search="true" name="country_id">
                                        <option selected disabled >Choose Country</option>
                                        @foreach(\App\Model\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-control selectpicker" data-live-search="true" name="job_id">
                                        <option selected disabled >Job Title</option>
                                        @foreach(\App\Model\Job::all() as $job)
                                            <option value="{{ $job->id }}">{{ $job->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-search form-control">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
