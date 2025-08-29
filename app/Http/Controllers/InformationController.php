<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    
  public function showForm(){
   return view('informations');
  }

  public function editInfo(Information $edit_info){
    $info = Information::all();
   return view('update_informations', compact('edit_info','info'));
  }

    public function store(StoreRequest $request){
     
       $validator = $request->validated();
       $validator['password'] = bcrypt($validator['password']);
        Information::create($validator);

        return redirect()->route('show')->with('success', 'Data is stored');
  }

    public function update(UpdateRequest $request, Information $update_info){

       $validator = $request->validated();
       if($request->has('password')){
        $validator['password'] = bcrypt($validator['password']);
       }

       else{
        unset($validator['password']);
       }

        $update_info->update($validator);

        return redirect()->route('show')->with('success', 'Data is updated');
  }

    public function delete(Information $delete_info){
     $delete_info->delete();
  }




}
