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
                            <p class="h5">Search in 750 Nannies and more...</p>
                            <hr>
                            <form action="{{url('/filter-nannies')}}" method="get">
                                <div class="mb-lg-3 mb-2">
                                    <label class="mr-2 mb-0">Nationality</label>
                                    <select class="selectpicker">
                                        <option>South Africa</option>
                                        <option>Cameron</option>
                                        <option>Kenyan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="mr-4 mb-0">Job Title</label>
                                    <select class="selectpicker">
                                        <option>South Africa</option>
                                        <option>Cameron</option>
                                        <option>Kenyan</option>
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
