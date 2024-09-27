<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\SendOTPJob;
use Illuminate\Http\Request;
use App\Jobs\FormSubmitUseJob;
use App\Jobs\MoneyTransferJob;
use App\Jobs\FormSubmitUserJob;
use App\Jobs\FormSubmitAdminJob;
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
            //send user mail job
            for( $i=0; $i<5; $i++){

                FormSubmitUserJob::dispatch($request->all());
            }

            $users = User::take(10)->latest()->get();
            //send user mail job
            FormSubmitAdminJob::dispatch($users);


           DB::commit();
           //send admin mail
           return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        // dd($request->all());
    }

    public function sendOPT(){
        SendOTPJob::dispatch()->onQueue('high');
        return redirect()->back();
    }

    public function moneyTransfer(){
        return view('money-transfer');
    }

    public function moneyTransferSubmit(Request $request){
        MoneyTransferJob::dispatch($request->amount);
        return redirect()->back();
    }
}
