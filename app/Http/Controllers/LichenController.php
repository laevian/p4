<?php

namespace Lichen\Http\Controllers;

use Lichen\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class LichenController extends Controller {

  public function getIndex() {
    $projects = \Lichen\Project::all();
    $files = \Lichen\File::where('project_id', 'LIKE', '1')->get();

  return view('welcome', [
     'projects'=>$projects,
     'files'=>$files,
     'this_project'=>1
    ]);
  }

  public function getUpload() {

    $projects = \Lichen\Project::all();
    return view('layouts.upload')->with('projects', $projects);
  }

  public function postEdit(Request $request, $name){

        $this->validate($request, [
        'name' => 'required|alpha_num',
      ]);


      $project = \Lichen\Project::where('name', 'LIKE', $request->project)->first();
      $project_id = $project->id;

      #uses the original name to find the original file
      $file = \Lichen\File::where('file_name', 'LIKE', $name)->first();
      $file->file_name = $request->name;
      $file->project_id = $project_id;
      $file->save();

  return redirect('/');

  }


    public function getDelete($name){

        $file = \Lichen\File::where('file_name', 'LIKE', $name)->first();

        \Storage::Delete($file->file_location);

        $file->delete();

    return redirect('/');

  }




  public function getEdit($image_name) {


    $projects = \Lichen\Project::all();
    return view('edit', [
      'projects'=>$projects,
      'image_name'=>$image_name,
    ]);
  }


  public function getProject($project_name) {

    $projects = \Lichen\Project::all();
    #trying to query collections sucks.
    $reorganize = $projects->keyBy('name');
    #returns the object wtih the name $project_name as a Collection.
    $this_project = $reorganize->get($project_name);
    #returns the exact ID number. Huzzah!
    $this_project_id = $this_project->id;

    $files = \Lichen\File::where('project_id', 'LIKE', $this_project_id)->get();

    if($files != null)
    {
      return view('welcome', [
         'projects'=>$projects,
         'files'=>$files,
         'this_project'=>$this_project_id,
        ]);
    }
    else
    {
      return view('welcome', [
         'projects'=>$projects,
         'this_project'=>$this_project_id,
        ]);
    }

  }

    public function postUpload(Request $request) {

    $this->validate($request, [
    'image' => 'required|image',
    'name' => 'required|alpha_num',

  ]);

    #takes the uploaded image and stores it in /uploads under its new name.
    $image = $request->file('image');
    $ext = Input::file('image')->getClientOriginalExtension();
    $new_name = $request->name. '.' .$ext;
    $file_name = $request->name;


    $file_location = public_path() . '/uploads/';
    Input::file('image')->move($file_location, $new_name);


    $true_location = '/uploads/' . $new_name;


  $project = \Lichen\Project::where('name', 'LIKE', $request->project)->first();
  $id = $project->id;
  $ext = File::extension($file_name);

  $file = new \Lichen\File();
  $file->file_name = $file_name;
  $file->project_id = $id;
  $file->file_location = $true_location;
  $file->save();

return redirect('/');

  }

}
