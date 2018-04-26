<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\client;
use App\address;
use App\User;


use Session;

use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.clients', ['allclients' => client::orderBy('created_at', 'desc')->paginate(4) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add-client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'company' => 'max:255',
            'address1' => 'required|max:255',
            'address2' => 'max:255',
            'image' => 'image',
            'hometelephone' => 'max:15',
            'worktelephone' => 'max:15',
            'mobile' => 'max:15',
            'zipcode' => 'max:10',
            'country' => 'required'
        ]);



        $client = new client();

        $image = $request->image;
        if(!empty($image)){
            $file_new_name = time().$image->getClientOriginalName();
            $image->move('images/', $file_new_name);
            $client->client_image = $file_new_name;
        }else{
            $client->client_image = "profile.png";
        }


        $client->client_name = $request->name;
        $client->client_email = $request->email;
        $client->client_company = $request->company;
        $client->client_user_id = Auth::user()->id;
        $client->client_home_telephone = $request->hometelephone;
        $client->client_work_telephone = $request->worktelephone;
        $client->client_mobile = $request->mobile;
        $client->save();

        $lastId = DB::table('clients')->orderBy('client_id', 'DESC')->first();

        $address = new address();
        $address->address_user_id = $lastId->client_id;
        $address->address_line_1 = $request->address1;
        $address->address_line_2 = $request->address2;
        $address->country = $request->country;
        $address->address_zip_code = $request->zipcode;
        $address->save();
        

        Session::flash('success', 'Client was created successfully!'. print_r($request->enrol));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware('auth');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'company' => 'max:255',
            'address1' => 'required|max:255',
            'address2' => 'max:255',
            'image' => 'image',
            'hometelephone' => 'max:15',
            'worktelephone' => 'max:15',
            'mobile' => 'max:15',
            'zipcode' => 'max:10',
            'country' => 'required',
            'address_id' => 'required'
        ]);



        $client = client::find($id);

        $image = $request->image;
        if(!empty($image)){
            $file_new_name = time().$image->getClientOriginalName();
            $image->move('images/', $file_new_name);
            $client->client_image = $file_new_name;
        }else{
           // $client->client_image = "profile.png";
        }


        $client->client_name = $request->name;
        $client->client_email = $request->email;
        $client->client_company = $request->company;
        $client->client_user_id = Auth::user()->id;
        $client->client_home_telephone = $request->hometelephone;
        $client->client_work_telephone = $request->worktelephone;
        $client->client_mobile = $request->mobile;
        $client->save();


        $address = address::find($request->address_id);
        $address->address_user_id = $id;
        $address->address_line_1 = $request->address1;
        $address->address_line_2 = $request->address2;
        $address->country = $request->country;
        $address->address_zip_code = $request->zipcode;
        $address->save();
        

        Session::flash('success', 'Client was updated successfully!'. print_r($request->enrol));
        return redirect()->back();
    }

    public function editclient($id){
        $client = client::find($id);
        return !empty($client) ? view('client.edit_client', ['client' => $client]) : view('error.error', ['error' => 'Client Profile not found']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    

    public function getClientProfile($client_id){

        $client = client::find($client_id);

        return !empty($client) ? view('client.client_profile', ['client' => $client]) : view('error.error', ['error' => "Client profile not found"]);

    }


}
