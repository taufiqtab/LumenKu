<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $data = Todo::all();
        return response($data);
    }
    
    public function show($id){
        $data = Todo::where('id',$id)->get();
        return response ($data);
    }
    
    public function store (Request $request){
        $data = new Todo();
        $data->title = $request->input('title');
        $data->desc = $request->input('desc');
        $data->save();
    
        return response('Berhasil Tambah Data');
    }

    public function update(Request $request, $id){
        $data = Todo::where('id',$id)->first();
        $data->title = $request->input('title');
        $data->desc = $request->input('desc');
        $data->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function destroy($id){
        $data = Todo::where('id',$id)->first();
        $data->delete();
    
        return response('Berhasil Menghapus Data');
    }

    //
}
