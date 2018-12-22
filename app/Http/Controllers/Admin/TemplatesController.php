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

    public function addTemplateType(Request $request){
        
        $this->validate(request(), [
            'type_name' => 'required',
        ]);

        TemplateType::insert([
            'type_name' => $request->type_name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Template Type Added!')->success();

        return back();
   }

   public function deleteTemplateType(TemplateType $type)
    {
        TemplateType::where('id', $type->id)->delete();

        flash('Template Type deleted!')->warning();

        return back();
    }

    public function showTemplates(TemplateType $type)
    {
        $type_location = preg_replace('/\s+/', '', $type->type_name);

    	$templates = Template::where('template_type_id', $type->id)->get();

    	return view('admin.templates.types.showtemplates', compact('type', 'type_location', 'templates'));
    }

    public function addTemplate(Request $request, TemplateType $type){
        
        $type_location = preg_replace('/\s+/', '', $type->type_name);

        $this->validate(request(), [
            'template_type_id' => 'required',
            'name' => 'required',
        ]);

        if($request->hasFile('template_file')){
            $template_file = $request->file('template_file');
            $filename = preg_replace('/\s+/', '', $request->name) . time() . '.' . $template_file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/templates/types/'.$type_location;
            $template_file->move($destinationPath,$filename);
            
        }
        Template::insert([
            'template_type_id' => $request->template_type_id,
            'name' => $request->name,
            'template_file' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash(' New '. $type->type_name . ' Template Added!')->success();

        return back();
   }

   public function deleteAgreementType(AgreementType $type)
    {
        AgreementType::where('id', $type->id)->delete();

        flash('Agreement Type deleted!')->warning();

        return back();
    }
}
