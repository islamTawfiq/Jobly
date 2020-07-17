@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Orders'])


        <!-- myOrders -->
        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="h5">You have to choose 3 CVs with $10 to starting the interviews</p>
                    </div>
                    @if ($nannies->count() == 0)
                    <div class="col-3"></div>
                        <div class="noCvs col-6">
                            <img src="{{url('design/site/images/no.jpg')}}" alt="">
                        </div>
                    @endif
                    @foreach ($nannies as $nanny)
                    <div class="col-12" @if ($nannies->count() == 1) {{ 'style=margin-bottom:200px' }} @elseif($nannies->count() == 2) {{ 'style=margin-bottom:12px;margin-top:12px' }} @endif >
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $nanny->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">You are request an interview with <strong>{{ $nanny->name }}</strong>
                                            from <strong>{{ $nanny->broker->name }}</strong>
                                        </h5>
                                        <p class="mb-0">Interview date & time: <span>{{ $nanny->date }} - {{ $nanny->time }}
                                                PM</span></p>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        {{--  <a href="" class="btn btn-primary btnDashboard">Book Interview</a>  --}}
                                        <a href="{{ url('/sponsor-dashboard/reject/') . '/' . $nanny->id }}" class="btn btn-primary btnDashboard">Reject</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-12">
                        <form>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mt-1">
                                        <label> Upload File <span class="font-weight-bold">(Attach
                                                photos)</span></label>
                                        <div class="container mt-2">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <label for="preview-contain" class="upload-photo mb-2">
                                                        <img src="{{ url('design/site/images/photo-camera.png') }}" alt="camera">
                                                    </label>
                                                    <input type="file" id="preview-contain" class="form-control attach"
                                                        multiple data-jpreview-container="#preview">
                                                </div>
                                                <div class="col-sm-10">
                                                    <!-- image preview -->
                                                    <div id="preview" class="jpreview-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Your Message">
                                    </div>
                                    <div class="col-lg-3 col-12 text-right">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>

    </main>
@stop
