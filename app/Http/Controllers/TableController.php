<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemMaster;
use App\Models\saleData;
use App\Models\Sites;
use App\Models\purchaseData;
use DB;
use Session;

class TableController extends Controller
{
    public function itemMasterTable()
    {
        $itemmasters = itemMaster::all();
        return view ('pages.itemMaster-table' ,['itemmasters' => $itemmasters]);
    }

    public function saleDataTable()
    {
        $list = DB::table('sale_data')->get();
        return view ('pages.salesData-table' ,['list' => $list]);
    }   

    public function purchaseDataTable()
    {
        $purchasedatas = purchaseData::all();
        return view ('pages.purchaseData-Table' ,['purchasedatas' => $purchasedatas]);
    }
    public function warehouseSite()
    {
        $sites = Sites::all();
        return view ('pages.warehouse-sites' ,['sites' => $sites]);
    }
 
  
    public function destroyItems($item_id)
    {
       $item = itemMaster::find($item_id); 
       //Session::flash('delete', 'deleted');
       $item->delete();
       Session::flash('deleted', 'Data has been deleted');
       return redirect()->back();
    }
    
}
