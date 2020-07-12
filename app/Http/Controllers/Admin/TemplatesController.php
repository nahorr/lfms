<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TemplateCategory;
use App\Template;
use App\Company;
use Illuminate\Validation\Rule;

class TemplatesController extends Controller
{
    public function showCategories(Company $company)
    {
        $templatecategory = TemplateCategory::where('company_id', $company->id)->get();

        return view('admin.templates.showcategories', compact('company', 'templatecategory'));
    }

    public function newCategory(Company $company)
    {

        return view('admin.templates.newcategory', compact('company'));
    }

    public function addNewCategory(Request $request, Company $company){

        $this->validate(request(), [
            'category_name' => Rule::unique('template_categories')->where(function ($query) use ($company) {
                return $query->where('company_id', $company->id);
            })
        ]);

        TemplateCategory::insert([
            'company_id' => $company->id,
            'category_name' => $request->category_name,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Template Category Added!')->success();

        return redirect()->route('admin.templatecategories', compact('company'));
   }

   public function deleteTemplateType(TemplateType $type)
    {
        TemplateType::where('id', $type->id)->delete();

        flash('Template Type deleted!')->warning();

        return back();
    }

    public function showTemplates(Company $company, TemplateCategory $category)
    {
        $category_location = preg_replace('/\s+/', '', $category->category_name);

    	$templates = Template::where('template_category_id', $category->id)->get();

    	return view('admin.templates.category.showtemplates', compact('company', 'category', 'category_location', 'templates'));
    }

    public function newTemplate(Company $company, TemplateCategory $category)
    {

        return view('admin.templates.category.newtemplate', compact('company', 'category'));
    }

    public function addTemplate(Request $request, Company $company, TemplateCategory $category){
        
        $category_location = preg_replace('/\s+/', '', $category->category_name);

        $this->validate(request(), [
            'name' => 'required',
        ]);

        if($request->hasFile('template_file')){
            $template_file = $request->file('template_file');
            $filename = preg_replace('/\s+/', '', $request->name) . time() . '.' . $template_file->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/templates/types/'.$category_location;
            $template_file->move($destinationPath,$filename);
            
        }
        Template::insert([
            'company_id' => $company->id,
            'template_category_id' => $category->id,
            'name' => $request->name,
            'template_file' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash(' New '. $category->category_name . ' Template Added!')->success();

        return redirect()->route('admin.templates', compact('category', 'company'));
   }

   public function deleteAgreementType(AgreementType $type)
    {
        AgreementType::where('id', $type->id)->delete();

        flash('Agreement Type deleted!')->warning();

        return back();
    }
}
