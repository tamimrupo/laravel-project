<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use App\form;
use Illuminate\Http\Request;

class formsController extends Controller
{
    public function forms(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            dd('error');
            return back()->withErrors($validator)->withInput();
        }
        $form = new form();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->country = $request->country;
        $form->city = $request->city;
        $form->salary = $request->salary;
        $form->save();
        return redirect('tables')->with('message', 'Add Successfully');
    }
}
