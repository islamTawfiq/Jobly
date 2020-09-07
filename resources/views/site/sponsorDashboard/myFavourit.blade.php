@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Favourites'])

        <div class="myPayments">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        @if ( count($nannies) == 0 )
                        <div class="row">
                            <div class="noCvs">
                                <img src="{{url('design/site/images/we-are-sorry.png')}}" alt="">
                            </div>
                        </div>
                        @endif

                        @if (count($nannies) > 0)
                        @foreach ($nannies as $nanny)
                            @foreach($nanny as $nanny)
                            <div class="card  {{ count($nannies) == 1 ? 'mt-5 mb-5' : '' }}">
                                <div class="row">
                                    <div class="col-sm-5 col-lg-4 imgCard">
                                        <a href="{{url( '/profile/' . $nanny->id )}}">
                                            <img src="{{ url( 'storage/' . $nanny->main_image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-8 col-sm-7 col-lg-4 cardDetail">
                                        <a href="{{url( '/profile/' . $nanny->id )}}">
                                            <p class="h3 mb-0">{{$nanny->name}}</p>
                                        </a>
                                        <p class="text-muted m-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{$nanny->country_name}}</span>
                                        </p>
                                        <table>
                                            <tr>
                                                <td>Job:</td>
                                                <td>{{$nanny->job_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Age:</td>
                                                <td>{{$nanny->age}}</td>
                                            </tr>
                                            <tr>
                                                <td>Experience:</td>
                                                <?php $experience = $nanny->experience1 + $nanny->experience2 + $nanny->experience3 ?>
                                                <td>
                                                    @if ($experience > 1)
                                                        {{ $experience }} Years
                                                    @elseif($experience == 1)
                                                        {{ $experience }} Year
                                                    @else
                                                        None
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Salary:</td>
                                                <td>{{ $nanny->salary }} $</td>
                                            </tr>
                                        </table>
                                        <a href="{{url( '/profile/' . $nanny->id )}}" class="btn btn-primary mt-1">Details</a>
                                    </div>
                                    <div class="col-12 col-lg-4 whoIam pt-3">
                                        <p class="h4">Who I am</p>
                                        <p>
                                            {{ Str::limit($nanny->about, 120) }}
                                            @if ( strlen($nanny->about) > 120 )
                                                <a href="{{url( '/profile/' . $nanny->id )}}">Read More</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                        {{--  <div class="row">
                            <div class="links">
                                {{ $nannies->links() }}
                            </div>
                        </div>  --}}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
