@extends('site.layout.dashboard')
@section('content')
    <main>

        <div class="topMain">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="h5">My CVs Status</p>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <div class="addNewCv">
                            <a href="{{ url('/broker-dashboard/add-cv') }}" class="btn btn-primary"><i
                                    class="fas fa-plus-circle"></i><span>Add New CV</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="myPayments">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="margin-bottom: 175px !important">
                        @if ( $nannies->count() == 0 )
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="noCvs col-6">
                                <img src="{{url('design/site/images/no.jpg')}}" alt="">
                            </div>
                        </div>
                        @elseif ( $nannies->count() > 0 )
                        <table class="table table-striped table-bordered text-center mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Nanny Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Client Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nannies as $nanny)
                                <tr>
                                    <td>{{ $nanny->name }}</th>
                                    <td>
                                        @if ($nanny->status != 3)
                                            <span class="text-danger">Pending</span>
                                        @elseif($nanny->status == 3)
                                            <span class="text-success">Hired</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $nanny->reserve->name }}
                                        @if ($nanny->reserve->user_type_id == 3)
                                            <span class="text-info">(Agency)</span>
                                        @elseif($nanny->reserve->user_type_id == 4)
                                            <span class="text-info">(Sponsor)</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="links">
                        {{ $nannies->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </main>
@stop
