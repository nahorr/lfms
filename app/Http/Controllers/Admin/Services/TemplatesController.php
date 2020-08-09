<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Service;
use App\Template;
use Image;
use Auth;
use File;
use Illuminate\Validation\Rule;

class TemplatesController extends Controller
{
    public function show(Company $company)
    {
    	$templates = Template::where('company_id', $company->id)->get();

    	return view('admin.services.templates.show', compact('company', 'templates'));
    }

    public function add(Company $company)
    {
    	$services = Service::where('company_id', $company->id)->get();

    	return view('admin.services.templates.add', compact('company', 'services'));
    }

    public function create(Request $request, Company $company)
    {
    	$this->validate(request(), [

    		'service_id' => 'required',
            'name' => Rule::unique('templates')->where(function ($query) use ($company) {
                return $query->where('company_id', $company->id);
            	}),
            'template_file' => 'required|file|mimes:jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg,odt,ods,odp,|max:10000'

    	]);

    	// Handle the user upload of template file
    	if($request->hasFile('template_file')){
    		$filename = preg_replace('/\..+$/', '', $request->file('template_file')->getClientOriginalName()) . time() . '.' . $request->file('template_file')->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/companies/templates/'.$company->id;
            $request->file('template_file')->move($destinationPath,$filename);
        }

    	Template::insert([
            'company_id' => $company->id,
            'service_id' => $request->service_id,
            'name' => $request->name,
            'description' => $request->description,
            'template_file' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Template  Added!')->success();

        return redirect()->route('admin.services.show.templates', compact('company'));
    }
}
