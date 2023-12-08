<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   *
   */
  public function index()
  {
      $My_Classes = Classroom::all();
      $Grades = Grade::all();
      return view('pages.My_Classes.My_Classes',compact('My_Classes','Grades'));

  }

  /**
   * Show the form for creating a new resource.
   *
   *
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   *
   */
  public function store(StoreClassroom $request)
  {
      $List_Classes= $request->List_Classes;


      try {


          foreach ($List_Classes as $List_Class) {

              $My_Classes = new Classroom();
              $My_Classes->Name_class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name_class']];
              $My_Classes->Grade_id = $List_Class['Grade_id'];
              $My_Classes->save();

          }

          toastr()->success(trans('messages.success'));
          return redirect()->route('Classrooms.index');
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

  /**
   * Display the specified resource.
   *

   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *

   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *

   */
  public function update(Request $request)
  {

      try {

          $Classrooms = Classroom::findOrFail($request->id);

          $Classrooms->update([

              $Classrooms->Name_class = ['ar' => $request->Name, 'en' => $request->Name_class_en],
              $Classrooms->Grade_id = $request->Grade_id,
          ]);
          toastr()->success(trans('messages.Update'));
          return redirect()->route('Classrooms.index');
      }

      catch
      (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

  /**
   * Remove the specified resource from storage.
   *
   */
  public function destroy(Request $request)
  {
      $Classrooms = Classroom::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Classrooms.index');

  }

}

?>
