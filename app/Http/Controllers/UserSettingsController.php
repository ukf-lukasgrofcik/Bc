<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;

class UserSettingsController extends BaseController
{

    public function profile(){
        $user = auth()->user();

        return view('system.settings.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request){
        $user = auth()->user();

        $user->update($request->only(['name', 'surname']));

        $this->_setFlashMessage('success', "Vaše údaje boli úspešne upravené.");

        return back();
    }

    public function password(){
        $user = auth()->user();

        return view('system.settings.password', compact('user'));
    }

    public function password_update(UpdatePasswordRequest $request){
        $user = auth()->user();

        $user->password = bcrypt($request->password);
        $user->save();

        $this->_setFlashMessage('success', "Vaše heslo bolo úspešne zmenené.");

        return back();
    }

}
