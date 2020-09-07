<!DOCTYPE html>
<html>
<head>
    <title>Generate Pdf</title>
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/bootstrap.min.css')}}" >
    <style>
        table {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="design/site/images/cv.png" class="m-4" style="width: 250px"/>
        <br>

        <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="bg-light">Image</td>
                <td>
                    <img src="{{ 'storage/' . $nanny->main_image }}" class="mt-4" style="width: 250px; height: 250px;"/>
                </td>
            </tr>
            <tr>
                <td class="bg-light">Ref</td>
                <td>
                @if ( $nanny->broker->user_type_id == 2 )
                    Sub-agent
                @endif
                @if ( $nanny->broker->user_type_id == 5 )
                    Agency
                @endif
                </td>
            </tr>
            <tr>
                <td class="bg-light">Job</td>
                <td>{{ $nanny->job_name }}</td>
            </tr>
            <tr>
                <td class="bg-light">Monthly salary</td>
                <td>${{ $nanny->salary }}</td>
            </tr>
            <tr class="btn-info">
                <td class="font-weight-bold border-right-0 text-white">Full name:</td>
                <td class="font-weight-bold border-left-0 text-white">{{ $nanny->name }}</td>
            </tr>
            <tr>
            <td class="font-weight-bold border-right-0 text-info">Applicant Details</td>
            <td class="border-left-0"></td>
            </tr>
            <tr>
            <td class="bg-light">Country</td>
            <td>{{ $nanny->country_name }}</td>
            </tr>
            <tr>
            <td class="bg-light">Religion</td>
            <td>{{ $nanny->religion }}</td>
            </tr>
            <tr>
            <td class="bg-light">Age</td>
            <td>{{ $nanny->age }} Years</td>
            </tr>
            <tr>
            <td class="bg-light">Marital status</td>
            <td>{{ $nanny->marital_status }}</td>
            </tr>
            <tr>
                <td class="bg-light">No. of children</td>
                <td>{{ $nanny->children }}</td>
            </tr>
            <tr>
            <td class="bg-light">Weight</td>
            <td>{{ $nanny->weight }}</td>
            </tr>
            <tr>
            <td class="bg-light">Height</td>
            <td>{{ $nanny->height }}</td>
            </tr>
            <tr>
            <td class="bg-light">Education</td>
            <td>{{ $nanny->education }}</td>
            </tr>
            <tr>
            <td class="font-weight-bold border-right-0 text-info">Languages</td>
            <td class="border-left-0"></td>
            </tr>
            <tr>
            <td class="bg-light pl-5">Arabic</td>
            <td>{{ $nanny->arabic_lang }}</td>
            </tr>
            <tr>
            <td class="bg-light pl-5">English</td>
            <td>{{ $nanny->english_lang }}</td>
            </tr>

            <tr>
            <td class="font-weight-bold border-right-0 text-info">Experience</td>
            <td class="border-left-0"></td>
            </tr>

            @if ($nanny->noneExperience == 1)
            <tr>
                <td class="bg-light border-right-0 pl-5">
                    None
                </td>
                <td class="bg-light border-left-0"></td>
            </tr>
            @endif

            @if ($nanny->country_ex1 && $nanny->experience1)
            <tr>
                <td class="bg-light pl-5">{{ $nanny->country_ex1 }}</td>
                <td>{{$nanny->experience1}}
                    @if ($nanny->experience1 > 1)
                        Years
                    @else
                        Year
                    @endif
                </td>

            </tr>
            @endif
            @if ($nanny->country_ex2 && $nanny->experience2)
            <tr>
                <td class="bg-light pl-5">{{ $nanny->country_ex2 }}</td>
                <td>{{$nanny->experience2}}
                    @if ($nanny->experience2 > 1)
                        Years
                    @else
                        Year
                    @endif
                </td>
            </tr>
            @endif
            @if ($nanny->country_ex3 && $nanny->experience3)
            <tr>
                <td class="bg-light pl-5">{{ $nanny->country_ex3 }}</td>
                <td>{{$nanny->experience3}}
                    @if ($nanny->experience3 > 1)
                        Years
                    @else
                        Year
                    @endif
                </td>
            </tr>
            @endif

            <tr>
            <td class="font-weight-bold border-right-0 text-info">Skills</td>
            <td class="border-left-0"></td>
            </tr>
            @foreach ($skills as $item)
            <tr>
            <td class="bg-light border-right-0">{{ $item }}</td>
            <td class="bg-light border-left-0"></td>
            </tr>
            @endforeach
            <tr>
            <td class="font-weight-bold border-right-0 text-info">Passport Images</td>
            <td class="border-left-0"></td>
            </tr>
            @foreach ($passport as $item)
            <tr>
            <td class="bg-light border-right-0">
                <img src="{{ 'passport/' . $item }}" style="width: 250px; height: 250px;"/>
            </td>
            <td class="bg-light border-left-0"></td>
            </tr>
            @endforeach
            <tr>
            <td class="font-weight-bold border-right-0 text-info">Documents</td>
            <td class="border-left-0"></td>
            </tr>
            @foreach ($medical as $doc)
            <tr>
            <td class="bg-light border-right-0">
                <img src="{{ 'medical/' . $doc }}" style="width: 250px; height: 250px;"/>
            </td>
            <td class="bg-light border-left-0"></td>
            </tr>
            @endforeach
        </tr>
        </tbody>
        </table>

    </div>
</body>
</html>
