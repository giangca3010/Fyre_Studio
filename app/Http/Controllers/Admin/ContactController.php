<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
//        dd(json_decode($aboutUs->box_about_vi));
        return view('core-ui.pages.contact.index', ['contact' => $contact]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $contact = Contact::first();

            $data = [
                'contact_en' => $request->contact_en ?? '',
                'contact_vi' => $request->contact_vi ?? '',
                'title_en' => $request->title_en ?? '',
                'title_vi' => $request->title_vi ?? '',
                'desc_en' => $request->desc_en ?? '',
                'desc_vi' => $request->desc_vi ?? '',

                'latitude' => $request->latitude ?? '',
                'longitude' => $request->longitude ?? '',
            ];
            $data['slug_en'] = str_slug($request->contact_en) ?? '';
            $data['slug_vi'] = str_slug($request->contact_vi) ?? '';

            $data['box_contact_en'] = json_encode([
                'box_name' => $request->box_title_en,
                'box_value' => $request->contact_value_en,
            ]);
            $data['box_contact_vi'] = json_encode([
                'box_name' => $request->box_title_vi,
                'box_value' => $request->contact_value_vi,
            ]);
            if ($contact){
                $contact->update($data);
            }else{
                Contact::create($data);
            }
            Session::flash('success', 'Update thành công');
            DB::commit();
            return redirect('/admin/contact');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Update thất bại!');
            return response()
                ->json([
                    'success' => false,
                    'message' => $exception->getMessage()
                ]);
        }
    }
}
