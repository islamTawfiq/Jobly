    <!-- start top-menu -->
    <header class="homeBackground">
        <div class="container">
            <div class="row">

                @include('site.layout.navbars.navbar')

                <div class="col-12 col-lg-4">
                    <div class="gteNanny">
                        <p class="h3">Get Your Nanny Now</p>
                        <p>Lorem, ipsum dolor sit amet consectetur.</p>
                        <div class="searchInNannies">
                            <?php $nanny = \App\Model\Nanny::all(); ?>
                            <p class="h5">Search in {{ count($nanny) }} Nannies and more...</p>
                            <hr>
                            <form action="{{url('/filter')}}" method="post">
                                @csrf
                                <div class="mb-lg-3 mb-2">
                                    <select class="form-control" name="country_id">
                                        <option selected disabled >Choose Country</option>
                                        @foreach(\App\Model\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" name="job">
                                        <option selected disabled >Job Title</option>
                                        <option {{request('job') == 'Driver' ? 'selected' : ''}}>Driver</option>
                                        <option {{request('job') == 'Farmer' ? 'selected' : ''}}>Farmer</option>
                                        <option {{request('job') == 'Guard' ? 'selected' : ''}}>Guard</option>
                                        <option {{request('job') == 'Servants' ? 'selected' : ''}}>Servants</option>
                                        <option {{request('job') == 'Cleaning' ? 'selected' : ''}}>Cleaning</option>
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
