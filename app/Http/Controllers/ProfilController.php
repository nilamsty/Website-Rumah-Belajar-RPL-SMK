<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function update(UpdateProfilRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('profil')->with('message', 'Profile saved successfully');
    }    
}
