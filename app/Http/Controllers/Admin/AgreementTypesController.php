<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AgreementType;

class AgreementTypesController extends Controller
{
    public function showAgreementTypes()
    {
    	$agreement_types = AgreementType::get();

    	return view('admin.agreements.types.showagreementtypes', compact('agreement_types'));
    }
}
