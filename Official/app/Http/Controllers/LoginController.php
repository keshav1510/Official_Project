<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\ChatMsg;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function insert(Request $req){
        $x=new Employee();

    //    $abc=Hash::make($req->Password);
        $x->Name=$req->Name;
        $x->Mobile=$req->Mobile;
        $x->Password=$req->Password;
        
        $x->Designation=$req->Designation;
        $x->UserName=$req->Name.rand(10,100);

         $detail=[ 'Your Name'=>$req->Name,
            'Your Mobile'=>$req->Mobile,
            ' Your Designation'=>$req->Designation,
           'Your UserName'=>$x->UserName,
        
        ];

       if($x->save()) {return response()->json(['Your details has been registered'=>$detail]);}
       else { return response()->json('Error 404'); }
         
    
    }


    public function login(Request $req){

        
        $y=new Employee();
        $mUser=$y->where('UserName',$req->UserName)->first();
        

        if(!$mUser){
            $msg="Oops!! The given user doesn't exist";
            return response()->json(['message'=>'UserName is not found']);
        }

       if($mUser && Hash::check($req->Password, $mUser->Password))
       {
            $token = $mUser->createToken('auth_token')->plainTextToken;

            $mUser->remember_token=$token;
          $rom = $mUser->save()? "you are successfully login " : "you are not successfully login" ;
         $employee= Employee::select('UserName')->where('UserName','!=',$req->UserName)->get();
          
            
            $data1= ['name'=> $mUser->Name, 'token' => $token, 'token_type'=> 'Bearer'];
              return response()->json(['message'=>$rom,'detail'=>$data1,'friend list'=>$employee]);
         }
         else
         {
          return "Password is Incorrect";
        }
        


        
    }
    public function logout(Request $req)
    { //client logout 1.3
        //  $user=$req->user();//geting autherized user details
        $user=Auth::user();
        
         if($user->currentAccessToken())
        {
        $user->currentAccessToken()->delete();

         $user->where('id',$user->id)->update(['remember_token'=>" "]);


        return response()->json(["message"=>" Logged out successfully "]);
        }
    }

    public function list(Request $req){
    $employees = Employee::select('UserName')->get();
    return response()->json(['data' => $employees]);
    }

    public function chat(Request $req){
        $m=new ChatMsg();

        $m->Sender_Id=$req->Sender_Id;
        $m->Receiver_Id=$req->Receiver_Id;
        $m->Message=$req->Message;
        $m->Convo_Id= $m->Sender_Id.'-'.$m->Receiver_Id;
        
       $var= $m->save()?"ok":"not ok";
       echo $var;
    }

    public function message(Request $req){
        $new=new ChatMsg();
        
    $messages = ChatMsg::where('Convo_Id',$req->Convo_Id)->get('Message');
    return response()->json(['msg'=>$messages]);


}
    public function update(Request $req){
        $z=new Employee();

        $z->where('id', $req->id)->update($req->all());

                 return response()->json(['message' => 'update successfull']);

    } 


}








