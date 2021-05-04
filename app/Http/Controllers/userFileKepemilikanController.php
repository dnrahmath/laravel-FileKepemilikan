<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\userFileKepemilikan;  //--------------- pakai ini

use Validator; //----------------- jgn lupa




class userFileKepemilikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //menyiapkan request untuk disimpan ke array input
        $input = $request->all();

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('data');
        $file_name = $file->getClientOriginalName();
        $file_exten = $file->getClientOriginalExtension();
        $file_path = $file->getRealPath();
        $file_size = $file->getSize();
        $file_mime = $file->getMimeType();
        
        //mengisi ke array request
        $input['mime'] = $file_mime;

        //----------------------------------------------------------------------------

        $validator = Validator::make($input, [
            'namaPemilik' => 'required',
            'mime' => 'required',
            'data' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip'
        ]);
         if($validator->fails()){
         return $this->sendError('Validation Error.', $validator->errors());       
         }

        //----------------------------------------------------------------------------

        $dataFileKepemilikan = userFileKepemilikan::create($input);

        return response()->json([
        "success" => true,
        "message" => "Product created successfully.",
        "dataFileCreate" => $dataFileKepemilikan,
        "File Name : " => $file_name,
        "File Extension : " => $file_exten,
        "File Path : " => $file_path,
        "File Size : " => $file_size,
        "File Mime : " => $file_mime
        ]);
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
    public function update(Request $request, $id)
    {
        //
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
