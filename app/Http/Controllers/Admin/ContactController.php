<?php

namespace App\Http\Controllers\admin;

use DB;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ContactController extends Controller
{
    //
    public function add_contact()
    {
        return view('admin.add_contacts');
    }

    public function save_contact(Request $request)
    {
        $data = $request->all();
        $contact = new Contact();
        $contact->name= $data['name'];
        $contact->phone= $data['phone'];
        $contact->email= $data['email'];
        $contact->message= $data['message'];
        $contact->status= $data['status'];

        $contact->save();

        Session::put('message','Thêm mới Contact thành công!');
        return Redirect::to('add-contact');

    }
    public function show_contacts()
    {
        $show_contact = Contact::orderBy('id','DESC')->get();
        $manager_contact = view('admin.all_contacts')->with('show_contact', $show_contact);
        return view('admin_layout')->with('admin.all_contacts', $manager_contact);
    }

    public function edit_contacts($contacts_id)
    {
        $edit_contacts = Contact::find($contacts_id);
        $manager_contact = view('admin.edit_contacts')->with('edit_contacts', $edit_contacts);

        return view('admin_layout')->with('admin.edit_contacts',$manager_contact);
    }

    public function update_contacts(Request $request,$contacts_id)
    {
        $data = $request->all();
        $contacts =Contact::find($contacts_id);
        $contacts->name = $data['name'];
        $contacts->phone = $data['phone'];
        $contacts->email = $data['email'];
        $contacts->message = $data['message'];
        $contacts->status = $data['status'];
        $contacts->save();

        Session::put('message','Update Contacts Thành Công!');
        return Redirect::to('list-contact');
    }

    public function delete_contacts($contacts_id)
    {
        DB::table('contacts')->where('id',$contacts_id)->delete();
        Session::put('message','Xóa Contacts thành công!');
        return Redirect::to('list-contact');
    }
}
