<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Users::all()->toArray();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required'
        ]);
        $users = new Users([
            'first_name'    =>  $request->get('first_name'),
            'last_name'     =>  $request->get('last_name')
        ]);
        $users->save();
        return redirect()->route('name_users.index')->with('success', 'Data Added');
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
        $data_user = Users::find($id);
        return view('user.edit', compact('data_user', 'id'));
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
         $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required'
        ]);
        $edit_data = Users::find($id);
        $edit_data->first_name = $request->get('first_name');
        $edit_data->last_name = $request->get('last_name');
        $edit_data->save();
        return redirect()->route('name_users.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
