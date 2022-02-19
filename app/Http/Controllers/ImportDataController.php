<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BulkImport;
use App\Models\itemMaster;
use App\Models\ClientSites;
use App\Models\User;
use DB;
use Auth;
use Session;
use Response;

use Illuminate\Http\Request;

class ImportDataController extends Controller
{ 
    public function importDataView()
    {
      $clients = ClientSites::select('client')->distinct()->get();
      $identitys = ClientSites::select('identity')->distinct()->get();
      return view('pages.import-data',['clients' => $clients, 'identitys' => $identitys]);
    }
  public function importData()
  {       
        try
        {     
          $type = $_POST['import_type'];
          //echo'<pre>'; print_r($type); die;     
           //echo'<pre>'; print_r($_FILES); die;  
           $identity = $_POST['identity'];
           $client = $_POST['client'];
           $data = Excel::import(new BulkImport, request()->file('file'));
            
            $response['import_type'] = $type;
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

    public function getsinglepdf()
    {
 
      if (Auth::check()) 
        {
          //$site_id = Auth::user()->id;  
          //$role = Auth::user()->role;
          //$role_name = $role->name;
         // echo'<pre>';print_r($site_id->role);die;
          $site_id = Auth::User();
          if($site_id->role == 'super admin'){
          $sites = DB::table('identity_client_sites')->select('sites')->distinct()->get();
          $identitys = DB::table('identity_client_sites')->select('identity')->distinct()->get();
          $clients = DB::table('identity_client_sites')->select('client')->distinct()->get();

            }else{   
            $sites = DB::table('users')->select('sites')->where('sites',$site_id->sites)->distinct()->get();
            $identitys = DB::table('users')->select('identity')->where('identity', $site_id->identity)->distinct()->get();
            $clients = DB::table('users')->select('client')->where('client',$site_id->client)->distinct()->get();
            //$clients = $cl->toArray();
            //$s = json_decode($clients);
            //echo'<pre>';print_r($client);die;
          } 
          $group = DB::table('item_master')->select('group')->distinct()->get();
          return view('pages.singlePdf',['list' => $group, 'site' => $sites, 'identity' => $identitys, 'client' => $clients]);
        }
         else{
         return redirect('/login');
      }
    }
    public function getItemsofgroup()
    {
       //echo "<pre>";print_r($_POST);die;
        $packing = DB::table('item_master')->select('pack')->where('group',$_POST['group'])->distinct()->get();
        $response['success'] = true;
        $response['messages'] = $packing;
        return Response::json($response);
    }

    public function bulkpdf()
    {
        if (Auth::check())
        {
            $site_id = Auth::User();
            //echo "<pre>";print_r($user_id);die;
            if($site_id->role == 'super admin'){
              $sites = DB::table('identity_client_sites')->select('sites')->distinct()->get();
              $identitys = DB::table('identity_client_sites')->select('identity')->distinct()->get();
               $clients = DB::table('identity_client_sites')->select('client')->distinct()->get();
            }
            else{
              $sites = DB::table('users')->select('sites')->where('sites',$site_id->sites)->distinct()->get();
              $identitys = DB::table('users')->select('identity')->where('identity', $site_id->identity)->distinct()->get();
              $clients = DB::table('users')->select('client')->where('client',$site_id->client)->distinct()->get();
            } 
            $group = DB::table('item_master')->select('group')->distinct()->get();
             return view('pages.BulkPdf', ['list' => $group, 'site' => $sites, 'identity' => $identitys, 'client' => $clients]);
          }
          else{
           return redirect('/login');
        }
     }  
}
