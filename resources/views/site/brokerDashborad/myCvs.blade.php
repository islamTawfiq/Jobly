@extends('site.layout.dashboard')
@section('content')
    <main>

        <div class="topMain">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="h5">My CVs</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, modi!</p>
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
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Nanny Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Client Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Joliana Jofain</th>
                                    <td>Hired</td>
                                    <td>Khaber Agency</td>
                                </tr>
                                <tr>
                                    <td>Joliana Jofain</td>
                                    <td>Hired</td>
                                    <td>Khaber Agency</td>
                                </tr>
                                <tr>
                                    <td>Joliana Jofain</td>
                                    <td>Waiting</td>
                                    <td>Khaber Agency</td>
                                </tr>
                                <tr>
                                    <td>Joliana Jofain</td>
                                    <td>Rejected</td>
                                    <td>Khaber Agency</td>
                                </tr>
                                <tr>
                                    <td>Joliana Jofain</td>
                                    <td>Canceled</td>
                                    <td>Khaber Agency</td>
                                </tr>
                                <tr>
                                    <td>Joliana Jofain</td>
                                    <td>Hired</td>
                                    <td>Khaber Agency</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
@stop