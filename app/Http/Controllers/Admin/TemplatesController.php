<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TemplateType;
use App\Template;

class TemplatesController extends Controller
{
    public function showTemplateTypes()
    {
        
        return view('admin.templates.showtemplatetypes');
    }

    public function showAgreementTypes()
    {
    	$agreement_types = AgreementType::get();

    	return view('admin.agreements.types.showagreementtypes', compact('agreement_types'));
    }

    public function addAgreementType(Request $request){
        
        $this->validate(request(), [
            'name' => 'required',
        ]);

        if($request->hasFile('template')){
            $template = $request->file('template');
            $filename = preg_replace('/\s+/', '', $request->name) . time() . '.' . $template->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/agreements/types/';
            $template->move($destinationPath,$filename);
            
        }
        AgreementType::insert([
            'name' => $request->name,
            'template' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Agreement Type Added!')->success();

        return back();
   }

   public function deleteAgreementType(AgreementType $type)
    {
        AgreementType::where('id', $type->id)->delete();

        flash('Agreement Type deleted!')->warning();

        return back();
    }
}
