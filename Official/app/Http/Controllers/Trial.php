<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class Trial extends Controller
{
    public function inserted(Request $req){
        $a=new Employee();

        // $abc=Hash::make($req->Password);
        // all data are inserted through request object
        $a->Name=$req->Name;
        $a->Mobile=$req->Mobile;
        $a->Password=$req->Password;
        $a->Designation=$req->Designation;
        $a->UserName=$req->UserName;

        $data=['Your Name'=>$req->Name,
        'Your Mobile'=>$req->Mobile,
        'Your Designation'=>$req->Designation,
        'Your UserName'=>$req->UserName,

        ];

        if($a->save()) {return response()->json(['data is inserted'=>$data]);}
        else{
            return response()->json(['Error']);
        }

        
    }

// In this function I will create hashcode for the password with the help of [Hash::make($req->Password)]
    public function newinsert(Request $req){
        $b=new Employee();

        $x=Hash::make($req->Password);

        $b->Name=$req->Name;
        $b->Mobile=$req->Mobile;
        $b->Password=$x;
        $b->Designation=$req->Designation;
        $b->UserName=$req->Name.rand(10,1000);

          $data=['Your Name'=>$req->Name,
        'Your Mobile'=>$req->Mobile,
        'Your Designation'=>$req->Designation,
        'Your UserName'=>$b->UserName,
        ];

        if($b->save()) {return response()->json(['Inserted'=>$data]);}
        else{
            return response()->json(['Error Occured']);
        }


    }
}
