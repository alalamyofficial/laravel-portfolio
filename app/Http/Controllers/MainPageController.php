<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $main = Main::first();
        return view('pages.main')->with('main',$main);

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string', 
        ]);

        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;
        $main->website_name = $request->website_name;

        if($request->file('bg_img')){

            $img_file = $request->bg_img;

            $new_image = time().$img_file->getClientOriginalName();

            $img_file->move('public/imgs/',$new_image);

            $main->bg_img = 'public/imgs/'.$new_image;

            // $img_file->storeAs('public/imgs/','bg_img.' . $img_file->getClientOriginalExtension());
            // $main->bg_img = 'storage/imgs/bg_img.' . $img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdfs/','resume.' . $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdfs/resume.' . $pdf_file->getClientOriginalExtension();
        }

        $main->save();

        return redirect()->route('admin.main')->with('success', "Main Page data has been updated successfully");


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
