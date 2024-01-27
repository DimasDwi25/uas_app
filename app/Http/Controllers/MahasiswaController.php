<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {

            $data = Mahasiswa::all();

            if($data->count() > 0){
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'status' => 'success',
                        'data' => $data
                    ],
                ]);
            } else{
                return response()->json([
                    'meta' => [
                        'code' => 400,
                        'status' => 'false',
                        'message' => 'data tidak ada'
                    ],
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'success',
                    'err' => $th
                ],
            ]);
        }


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
        try {
            //code...
            $data = Mahasiswa::create([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'prodi' => $request->prodi
            ]);

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'data' => $data,
                    'message' => 'success update category'
                ],
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'success',
                    'err' => $th
                ],
            ]);
        }


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
        try {
            $data = Mahasiswa::findOrFail($id);

            $data->update([
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mhs,
                'prodi' => $request->prodi
            ]);

            $data->save();

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Book updated successfully',
                    'data' => $data
                ],
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'success',
                    'err' => $th
                ],
            ]);
        }

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
        try {
            //code...
            Mahasiswa::destroy($id);

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'deleted successfully'
                ],
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'success',
                    'err' => $th
                ],
            ]);
        }
    }
}
