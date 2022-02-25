<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities=Speciality::latest()->get();

        return view('admin.specialities.index',compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["name"=>"required"]);
        Speciality::create([
            "name"=>$request->name
        ]);
        return redirect()->route('admin.specialities.index')->withToastSuccess('Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speciality=Speciality::findorfail($id);

        return view("admin.specialities.edit", compact("speciality"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $speciality=Speciality::findorfail($id);

        $request->validate([
            "name"=>"required"
        ]);

        $speciality->update([
            "name"=>$request->name
        ]);

        return redirect()->route('admin.specialities.index')->withToastSuccess('Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speciality = Speciality::findorfail($id);
        $speciality->delete();
        return redirect()->route("admin.specialities.index")->withToastSuccess('Successfully Deleted!');

    }
}
