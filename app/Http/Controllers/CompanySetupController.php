<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Identity;
use App\Models\Client;
use App\Models\ClientSites;
use App\Models\IdentityClientSites;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientImport;
use App\Imports\BulkImport;
use Response;
use Session;

class CompanySetupController extends Controller
{
   public function group()
   {
        $group = Group::all();
       return view('pages.group',['group'=>$group]);
   }

   public function addGroup(Request $request) 
    {
   //echo"<pre>"; print_r($_POST); die;
        $group = new Group;
        $group->group = $request->group; 

        $exists = DB::table('group')->count();             //insert only single row
        if($exists > 0){
        $response['success'] = false;
        $response['messages'] = 'Data already exist';
        return Response::json($response);
        }else{
            $group->save();
            $response['success'] = true;
            $response['messages'] = 'Succesfully imported';
            return Response::json($response);
        }
        
    }
    public function groupIdentity()
    {
        $lgroup = Group::all();
        $lidentity = Identity::all();
        return view('pages.identity-group',['lgroup'=>$lgroup,'lidentity'=>$lidentity]);
    }

    public function addIdentity(Request $request) 
   {
     //echo"<pre>"; print_r($_POST); die;
       $identity = new Identity;
       $identity->group = $request->group; 
       $identity->identity = $request->gidentity;
   
        $S = DB::table('identity')
       ->where('group', '=', $request['group'])
       ->where('identity', '=', $request['gidentity'])
       ->first();
       //echo"<pre>"; print_r($S); die;
       if(is_null($S)) {
       $identity->save();
     
       $response['success'] = true;
       $response['messages'] = 'Succesfully imported';
       return Response::json($response);
       }else{
           $response['success'] = false;
           $response['messages'] = 'Data already exist';
           return Response::json($response);
       }
       
   }
   public function clientIdentity()
   {
    $lgroup = Group::all();
    $lidentity = Identity::all();

     return view('pages.client-identity',['lgroup'=>$lgroup,'lidentity'=>$lidentity]);
   }

   
   public function addIdentityClient(Request $request) 
     {
       //echo"<pre>"; print_r($_POST); die;
       $client = new Client;
       $client->group = $request->group; 
       $client->identity = $request->identity;
       $client->client = $request->client;
   
        $S = DB::table('identity_client')
       ->where('identity', '=', $request['identity'])
       ->where('client', '=', $request['client'])
       ->first();
       //echo"<pre>"; print_r($S); die;
       if(is_null($S)) {
       $client->save();
     
       $response['success'] = true;
       $response['messages'] = 'Succesfully imported';
       return Response::json($response);
       }else{
           $response['success'] = false;
           $response['messages'] = 'Data already exist';
           return Response::json($response);
       }
       
   }

   public function clientSites()
   {
    $lgroup = Group::all();
    $lidentity = Identity::all();
    $lclient = Client::all();
     return view('pages.client-sites',['lgroup'=>$lgroup,'lidentity'=>$lidentity,'lclient'=>$lclient]);
   }


   public function createClient()
   {
   //echo'<pre>'; print_r($_POST); die;
    try
    {     
       //echo'<pre>'; print_r($_FILES); die;
           $group = $_POST['group'];
           $identity = $_POST['identity'];
           $client = $_POST['client'];
           $data = Excel::import(new ClientImport, request()->file('file'));
           $response['success'] = true;
           $response['messages'] = 'Succesfully imported';
           return Response::json($response);
    
       }catch (\Exception $e) {
          $response['success'] = false;
          $response['messages'] = 'something wrong';
          // echo'<pre>'; print_r($e); die;
          return Response::json($e);
    }

   }

   public function companygroupTable()
     {
         $group = ClientSites::all();
         return view('pages.companySetup-table',['group'=>$group]);
     }


     public function identityClientSites()
     { 
        $lgroup = Group::all();
        $lidentity = Identity::all();
        $lclient = Client::all(); 
         return view('pages.identity-client-site',['lgroup'=>$lgroup,'lidentity'=>$lidentity,'lclient'=>$lclient]);
     }

     public function addIdentitySites(Request $request) 
     {
       //echo"<pre>"; print_r($_POST); die;
       $clientSites = new IdentityClientSites;
       $clientSites->group = $request->group; 
       $clientSites->identity = $request->identity;
       $clientSites->client = $request->client;
       $clientSites->sites = $request->sites;
   
        
       //echo"<pre>"; print_r($S); die;
     
       $clientSites->save();
     
       $response['success'] = true;
       $response['messages'] = 'Succesfully imported';
       return Response::json($response);
      
       
   }

   public function destroyIdentity($identity_id)
   {

       $identity = ClientSites::find($identity_id); 
       //Session::flash('delete', 'deleted');
       $identity->delete();
       Session::flash('deleted', 'Data has been deleted');
       return redirect()->back();
    
   }

}
