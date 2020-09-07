<?php

namespace App\Http\Controllers\Site\nannyProfile;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use PDF;

class PDFController extends Controller
{

    public function generatePDF($id)
    {
        $nanny = Nanny::findOrFail($id);
        $skills = explode( "," , $nanny->skills );
        $passport = explode( "," , $nanny->passport );
        $medical = explode( "," , $nanny->medical );
        $pdf = PDF::loadView('site.nannyProfile.downloadCv', compact('nanny','skills','passport','medical'));
        return $pdf->download('codingdriver.pdf');
    }

}
