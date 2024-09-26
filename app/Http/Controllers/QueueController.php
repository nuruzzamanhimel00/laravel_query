<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\FormSubmitUserMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class QueueController extends Controller
{
    public function formSubmit(){
        return view('form-submit');
    }

    public function formSubmitStore(Request $request){
        $data = $request->all();
        try {
            DB::beginTransaction();

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            //send user mail
            Mail::to($request->email)->send(new FormSubmitUserMail($request->all()));

           DB::commit();
           //send admin mail
           return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        // dd($request->all());
    }
}
