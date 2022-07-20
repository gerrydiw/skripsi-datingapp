<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $cities = City::all();
        return view('profile', compact('user', 'cities'));
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
        $user = User::find($id);
        $cities = City::all();
        return view('viewprofile', compact('user', 'cities'));
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
        // abort_unless(\Gate::allows('mitra_edit'), 403);

        // $this->validate($request, [
        //     'nama'       => 'required',
        // ]);

        $user = User::find($id);

        $user->update($request->all());

        // toastr()->success('Jenis kemitraan berhasil diubah');

        return redirect()->route('profile');
    }

    public function updatePhoto(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->file != '') {
            $path = public_path() . '/images/profiles/';

            //code for remove old file
            if ($user->url_foto != ''  && $user->url_foto != null) {
                $file_old = $path . $user->url_foto;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file;
            $filename = time() . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            $user->update(['url_foto' => $filename]);
            return redirect()->route('profile');
        }
    }

    public function updateKtp(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->file != '') {
            $path = public_path() . '/images/identities/';

            //code for remove old file
            if ($user->url_ktp != ''  && $user->url_ktp != null) {
                $file_old = $path . $user->url_ktp;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file;
            $filename = time() . $file->getClientOriginalExtension();
            $file->move($path, $filename);

            //for update in table
            $user->update(['url_ktp' => $filename]);
            return redirect()->route('profile');
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
    }
}
