<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    //
    public function index()
    {
    	$organization = Organization::find(Auth::user()->organization_id);
        return view('organizations.index',compact('organization'));
    }

    public function mails()
    {
        $organization = Organization::find(Auth::user()->organization_id);
        return view('organizations.mail',compact('organization'));
    }

    public function mailupdate(Request $request){

      $organization = Organization::find(Auth::user()->organization_id);
      $organization->mail_driver = $request->driver;
      $organization->mail_host = $request->host;
      $organization->mail_port = $request->port;
      $organization->mail_username = $request->username;
      $organization->mail_password = $request->password;
      $organization->mail_encryption = $request->encryption;
      $organization->update();

         return json_encode(["driver"=>$organization->mail_driver,"host"=>$organization->mail_host,"port"=>$organization->mail_port,"username"=>$organization->mail_username,"password"=>$organization->mail_password,"encryption"=>$organization->mail_encryption]);
        
        echo json_encode(array("driver"=>$organization->mail_driver,"host"=>$organization->mail_host,"port"=>$organization->mail_port,"username"=>$organization->mail_username,"password"=>$organization->mail_password,"encryption"=>$organization->mail_encryption));
        exit();

    }

    public function showrecord()
    {
        $display = "";
        $organization = Organization::find(Auth::user()->organization_id);

        $display .="
        <tr>
        <td colspan='2'><a data-toggle='modal' data-name='$organization->name' data-logo='$organization->logo' data-email='$organization->email' data-phone='$organization->phone' data-address='$organization->address' data-currencyname='$organization->currency_name' data-currencyshortname='$organization->currency_shortname' data-nairobi='$organization->is_nairobi' data-central='$organization->is_central' data-coast='$organization->is_coast' data-eastern='$organization->is_eastern' data-western='$organization->is_western' data-nyanza='$organization->is_nyanza' data-northeastern='$organization->is_northeastern' data-rift='$organization->is_rift' id='edit' class='btn btn-primary' href='#modal-form'>Update Organization</a>&emsp;<a href='organization_report.php' target='_blank' class='btn btn-warning'>Organization Report</a></td>
      </tr>";

        $display .="<tr>
          <td>Logo</td>
          <td><img src=".url('/public/uploads/logo/'.$organization->logo)." width='100' height='100' alt='no logo' /></td>
        </tr>
        
        <tr><td><strong>Name:</strong></td><td>$organization->name</td></tr>
        <tr><td><strong>Email:</strong></td><td>$organization->email</td></tr>
        <tr><td><strong>Phone:</strong></td><td>$organization->phone</td></tr>
        <tr><td><strong>Address:</strong></td><td>$organization->address</td></tr>
        <tr><td><strong>Currency Name:</strong></td><td>$organization->currency_name</td></tr>
        <tr><td><strong>Currency Shortname:</strong></td><td>$organization->currency_shortname</td></tr>
        <tr>
        <td width='35%'><strong>Areas of Operation:</strong></td>
        <td>
        <ul style='margin-left:-30px;'>";
        if($organization->is_nairobi == 1){
        $display .="<li>Nairobi Province</li>";
        }
        if($organization->is_central == 1){
         $display .="<li>Coast Province</li>";
        }
        if($organization->is_coast == 1){
        $display .="<li>Central Province</li>";
        }
        if($organization->is_western == 1){
         $display .="<li>Western Province</li>";
        }
        if($organization->is_nyanza == 1){
         $display .="<li>Nyanza Province</li>";
        }
        if($organization->is_northeastern == 1){
         $display .="<li>North-Eastern Province</li>";
        }
        if($organization->is_eastern == 1){
         $display .="<li>Eastern Province</li>";
        }
        if($organization->is_rift == 1){
         $display .="<li>Rift-Valley Province</li>";
        }
         $display .="</ul>
        </td>
        </tr>
          ";
          
        return $display;
        exit();
    }

    public function update(Request $request)
    {
        $organization = Organization::find(Auth::user()->organization_id);
        
        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $organization->logo = $imageName;
        }else{
            $organization->logo = $organization->logo;
        }

        $organization->name = $request->name;
        $organization->address = $request->address;
        $organization->phone = $request->phone;
        $organization->email = $request->email;
        $organization->currency_name = $request->currency_name;
        $organization->currency_shortname = $request->currency_shortname;
        $organization->phone = $request->phone;
        $organization->is_nairobi = $request->nairobi;
        $organization->is_central = $request->central;
        $organization->is_western = $request->western;
        $organization->is_nyanza = $request->nyanza;
        $organization->is_coast = $request->coast;
        $organization->is_rift = $request->rift;
        $organization->is_eastern = $request->eastern;
        $organization->is_northeastern = $request->neast;

        $organization->update();
        return 1;
    }
}
