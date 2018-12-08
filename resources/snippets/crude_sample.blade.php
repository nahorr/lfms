<?php
namespace App\Http\Controllers\Admin\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseCategory;
use App\Course;
use File;
class CourseController extends Controller
{
    public function showCourseCategory(CourseCategory $coursecategory){
        $categorycourses = Course::where('course_category_id', $coursecategory->id)->get();
        return view('admin.courses.showcategorycourses', compact('coursecategory', 'categorycourses'));
    }
    public function storeAddCourse(Request $request , CourseCategory $coursecategory){
        $this->validate(request(), [
            'course_category_id' => 'required',
            'course_code' => 'required|unique:courses',
            'course_name' => 'required',
            'course_picture' => 'required|mimes:jpeg,jpg,png|max:10000',
            'course_description' => 'required',
            'course_moodle_link' => 'required',
            'course_mentor' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($request->hasFile('course_picture')){
            $course_picture = $request->file('course_picture');
            $filename = time() . '.' . $course_picture->getClientOriginalExtension();
            //$filename = $request->picture_name . '.' . $site_picture->getClientOriginalExtension();
            $destinationPath = public_path().'/unify/assets/img/coursepictures/';
            $course_picture->move($destinationPath,$filename);
            
        }
        Course::insert([
            'course_category_id' => $request->course_category_id,
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'course_picture' => $filename,
            'course_description' => $request->course_description,
            'course_moodle_link' => $request->course_moodle_link,
            'course_mentor' => $request->course_mentor,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('course Added!')->success();
        return back();
   }
   public function storeUpdateCourse(Request $request, Course $course)
    {
        $this->validate(request(), [
            'course_category_id' => 'required',
            //'course_code' => 'required|unique:courses',
            'course_name' => 'required',
            //'course_picture' => 'required|mimes:jpeg,jpg,png|max:10000',
            'course_description' => 'required',
            'course_moodle_link' => 'required',
            'course_mentor' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        $edit_course = Course::where('id', $course->id)->first();
        $edit_course->course_category_id = $request->course_category_id;
        //$edit_course->course_code = $request->course_code;
        $edit_course->course_name = $request->course_name;
        $edit_course->course_description = $request->course_description;
        $edit_course->course_moodle_link = $request->course_moodle_link;
        $edit_course->course_mentor = $request->course_mentor;
        $edit_course->start_date = $request->start_date;
        $edit_course->end_date = $request->end_date;
        
        if($request->hasFile('course_picture')){
            $course_picture = $request->file('course_picture');
            $filename = time() . '.' . $course_picture->getClientOriginalExtension();
            $destinationPath = public_path().'/unify/assets/img/coursepictures/';
            // Delete current image before uploading new image
            $file = public_path('/unify/assets/img/coursepictures/'.$filename);
            if (File::exists($file)) {
                    unlink($file);
                }          
            $course_picture->move($destinationPath,$filename);
            $edit_course->course_picture = $filename;
            
        }     
        $edit_course->save();
        flash('course Updated!')->success();
        return back();
     }
     public function deleteCourse(Course $course)
    {
        Course::where('id', $course->id)->delete();
        flash('course deleted!')->warning();
        return back();
    }
}