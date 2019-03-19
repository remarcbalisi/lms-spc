<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYearSemester;
use App\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class HomeController extends Controller
{
    public function dashboard(){
        return view('admin.home')->with([
            'academic_year_semesters' => AcademicYearSemester::get(),
        ]);
    }

    public function editHomePage(){
        return view('admin.home_page.edit')->with([
            'landing_page' => LandingPage::first(),
        ]);
    }

    public function updateHomePage(Request $request, $homepage_id) {
        $landingpage = LandingPage::where('id', $homepage_id)->first();
        $landingpage->head_line = $request->input('head_line');

        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $extension = $request->banner_image->extension();
            $filename = 'bg-masthead.' . $extension;
            Image::make($image)->save( storage_path('app/public/home_page/img/' . $filename ) );
            $landingpage->banner_image = 'home_page/img/' . $filename;
        };
        $landingpage->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully updated home page',
        ]);

    }
}
