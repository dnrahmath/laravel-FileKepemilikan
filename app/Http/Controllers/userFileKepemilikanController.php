<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\userFileKepemilikan;  //--------------- pakai ini
use App\Http\Resources\userFileKepemilikan as userFileKepemilikanResources;  //--------------- Resource untuk get

use Validator; //----------------- jgn lupa




class userFileKepemilikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    // [GET] ------------------------- menampilkan seluruh isi userFileKepemilikan
    {
        //
        $dataFileKepemilikan = userFileKepemilikan::all();
        return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $dataFileKepemilikan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    // [GET] ------------------------- menampilkan seluruh isi userFileKepemilikan untuk membuat resource baru
    {
        //
        $get_all_data = userFileKepemilikan::orderBy('id','DESC')->get();  // pengurutan dari yang terbesar
        return userFileKepemilikanResources::collection($get_all_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    // [POST] ------------------------- Melakukan input ke database
    {
        //
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
    public function show($id)    //-------------------------menampilkan id tertentu  yang dipilih dari isi userFileKepemilikan
    {
        //
        if (userFileKepemilikan::where('id', $id)->exists()) {
            //$dataFileKepemilikan = userFileKepemilikan::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT); //kalau mau bentuk JSON Rapih
            $dataFileKepemilikan = userFileKepemilikan::where('id', $id)->get();
            return response($dataFileKepemilikan, 200);
          } else {
            return response()->json([
              "message" => "Data tidak ditemukan atau sudah dihapus"
            ], 404);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  //------------------ mirip kyk create tapi lebih specifict , yang membedakan route GET - apinya
    {
        //
        if (userFileKepemilikan::where('id', $id)->exists()) {
            //$dataFileKepemilikan = userFileKepemilikan::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT); //kalau mau bentuk JSON Rapih
            $dataFileKepemilikan = userFileKepemilikan::where('id', $id)->get();
            return response($dataFileKepemilikan, 200);
          } else {
            return response()->json([
              "message" => "Data tidak ditemukan atau sudah dihapus"
            ], 404);
          }
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
        $dataFileKepemilikan = userFileKepemilikan::findOrFail($id);
        $input = $request->all();

        $file_mime = $_FILES["data"]["type"];
        $file_data = $_FILES["data"]["tmp_name"];
        
        //$input['mime'] = $file_mime;
        //$input['data'] = $file_data;
        
        //-masih error
        $input =
          [
            "namaPemilik" => $request->input('namaPemilik'),
            "mime" => $file_mime,
            "data" => $file_data
          ];
        

        /*
        $input =
          {
            "namaPemilik :" . $request->input('namaPemilik'),
            "mime :" . $file_mime,
            "data :" . $file_data
          };
        */
        
        /*
        if ($request->hasFile('data')){
          //
          if ($request->file('data')->isValid()) {
            //
          }
        }
        else 
        {
          return response()->json([
            "message" => "fle-uplod bernama 'data' tidak terinput",
            "_FILES" => $_FILES,
            'RequestAll' => $request->all(),
            'isiText' => $request->input('namaPemilik'),
            'isiFile' => $request->file('data')
          ], 404);
        }
        */

        //----------------------------------------------------------------------------
        $validator = Validator::make($input, [ //--input json 
            'namaPemilik' => 'required',
            'mime' => 'required|file' ,
            'data' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip' 
        
            //'mime' => 'required' . $request->input('data')->getMimeType(),
            //'data' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip' . $request->input('data')->getClientOriginalName()
        ]);
         if($validator->fails()){
            return response()->json([
                "message" => "500 - Internal Server Error - Validator fails",
                "_FILES" => $_FILES,
                'RequestAll' => $request->all(),
                'isiText' => $request->input('namaPemilik'),
                'isiFile' => $request->file('data'),
                'ManualFileMime' => $file_mime,
                'ManualFileData' => $file_data,
                'input' => $input
              ], 500);     
         }
        //----------------------------------------------------------------------------
        $dataFileKepemilikan->update($input);
        /*
        $dataFileKepemilikan->update()->json(
          [
            "namaPemilik" => $request->input('namaPemilik'),
            "mime" => $file_mime,
            "data" => $file_data
          ]
        );
        */

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
        //$dataFileKepemilikan = userFileKepemilikan::findOrFail($id);
        if(userFileKepemilikan::where('id', $id)->exists()) {
            $dataFileKepemilikan = userFileKepemilikan::findOrFail($id);
            $dataFileKepemilikan->delete();
    
            return response()->json([
              "message" => "dataFileKepemilikan records deleted"
            ], 202);
        } else {
            return response()->json([
              "message" => "id dataFileKepemilikan not found"
            ], 404);
        }
    }




}
