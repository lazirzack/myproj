<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mymodel;

class MymodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
		$keyword=$request->get('keyword');
	
		$mydata=Mymodel::all(); //dengan metode ini maka akan lansung ter-select semua data seperti query ( select * )
        //$mydata= Mymodel::select('id','name','alamat','email','notelp','created_at','updated_at');

		if($keyword){
			$mydata=Mymodel::where("name","LIKE","%$keyword%")->orderBy('id', 'asc')->get();
		}else{
			$mydata=Mymodel::orderBy('id', 'asc')->get();
		}
		
		return view('myproj.index',compact('mydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myproj.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
		$request->validate([
			'name'=>'required|max:255',
			'alamat'=>'required',
			'email'=>'required|max:255|email:rfc,dns',
			'notelp'=>'required|max:15'
		]);
	
		$mydata=new Mymodel([
			'name'=>$request->input('name'),
			'alamat'=>$request->input('alamat'),
			'email'=>$request->input('email'),
			'notelp'=>$request->input('notelp')
		]);
        $mydata->save();
		return redirect('/')->with('success','Data berhasil disimpan');
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
        $mydata= Mymodel::find($id);
		return view('myproj.edit',compact('mydata'));
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
		$mydata= Mymodel::find($id);
		
		$request->validate([
			'name'=>'required|max:255',
			'alamat'=>'required',
			'email'=>'required|max:255|email:rfc,dns',
			'notelp'=>'required|max:15'
		]);
	
		$mydata->name=$request->input('name');
		$mydata->alamat=$request->input('alamat');
		$mydata->email=$request->input('email');
		$mydata->notelp=$request->input('notelp');
		$mydata->save();
        
		return redirect('/')->with('success','Data berhasil di-edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $mydata= Mymodel::find($id);
	   $mydata->delete();
	   return redirect('/')->with('success','Data berhasil di-hapus');
    }
}
