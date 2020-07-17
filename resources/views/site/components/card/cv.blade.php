@if ( $nannies->count() == 0 && url()->current() == url('/broker-dashboard/all-cvs') )
<div class="row">
    <div class="col-3"></div>
    <div class="noCvs col-6">
        <img src="{{url('design/site/images/no.jpg')}}" alt="">
    </div>
</div>
@endif

@foreach ($nannies as $nanny)
<div class="card  {{ $nannies->count() == 1 ? 'm-5' : '' }}">
    <div class="row">
        <div class="{{ url()->current() == url('broker-dashboard/all-cvs') ? '' : 'col-4' }} col-sm-5 col-lg-4 imgCard">
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
                    <td>broker:</td>
                    <td>{{$nanny->broker_name}}</td>
                </tr>
                <tr>
                    <td>Job:</td>
                    <td>{{$nanny->job}}</td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td>{{$nanny->age}}</td>
                </tr>
                <tr>
                    <td>Experience:</td>
                    <td>{{$nanny->experience}}
                        @if ($nanny->experience > 1)
                            Years
                        @else
                            Year
                        @endif
                    </td>
                </tr>
                {{--  <tr>
                    <td>Languages:</td>
                    <td>English, Arabic</td>
                </tr>  --}}
                <tr>
                    <td>Salary:</td>
                    <td>{{ $nanny->salary }} QAR</td>
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
            @if ( url()->current() == url('/broker-dashboard/all-cvs') )
            <a class="btn btn-info" href="{{ url ( url()->current() . '/' . $nanny->id . '/edit' ) }}">Edit</a>
            <a href="{{ url()->current() . '/' . $nanny->id }}" class="btn btn-danger delete-confirm">Delete</a>
            @endif
        </div>
    </div>
</div>
@endforeach

{{-- @if ( url()->current() == url('/filter-nannies') )
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        {{ $nannies->setPath( url('/filter-nannies?') . $text  )->render() }}
    </div>
</div>
@endif --}}

@if ( url()->current() == url('/broker-dashboard/all-cvs') )
<div class="row">
    <div class="links">
        {{ $nannies->links() }}
    </div>
</div>
@endif
