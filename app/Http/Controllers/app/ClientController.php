<?php

namespace App\Http\Controllers\app;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function client_list()
    {
        $title = "Client List";
        $clientList = Client::get();
        return view('app.client.client_list', compact('clientList', 'title'));
    }

    public function client_create()
    {
        $key = "Create";
        $title = "Create Client";
        return view('app.client.client_form', compact('key', 'title'));
    }

    public function client_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_meta_tag' => 'required|min:5',
        ]);
        $client = new Client;
        if ($request->hasFile('image')) {
            $clientPath = public_path('uploads/client/');
            if (!file_exists($clientPath)) {
                mkdir($clientPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $clientName = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($clientPath, $clientName);
            $client->image = $clientName;
        }
        if ($request->hasFile('webp_image')) {
            $clientPath = public_path('uploads/client/webp/');
            if (!file_exists($clientPath)) {
                mkdir($clientPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $clientName = time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($clientPath, $clientName);
            $client->webp_image = $clientName;
        }
        $client->name = $request->name ?? '';
        $client->image_meta_tag = $validatedData['image_meta_tag'];
        if ($client->save()) {
            session()->flash('message', "'Client' has been added successfully");
            return redirect('admin/client');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function client_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Client";
        $client = Client::find($id);
        if ($client) {
            $image_with_path = url('uploads/client/' . $client->image);
            $webp_image_with_path = url('uploads/client/webp/' . $client->webp_image);
            return view('app.client.client_form',
                compact('key', 'client', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function client_view(Request $request, $id)
    {
        $title = "View Client";
        $client = Client::find($id);
        if ($client) {
            $image_with_path = url('uploads/client/' . $client->image);
            $webp_image_with_path = url('uploads/client/webp/' . $client->webp_image);
            return view('app.client.client_view',
                compact('client', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function client_update(Request $request, $id)
    {
        $client = Client::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        if ($request->hasFile('image')) {
            $clientPath = public_path('uploads/client/');
            if (!file_exists($clientPath)) {
                mkdir($clientPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $clientName = time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($clientPath, $clientName);
            if ($client->image != NULL) {
                unlink($clientPath . $client->image);
            }
            $client->image = $clientName;
        }
        if ($request->hasFile('webp_image')) {
            $iconPath = public_path('uploads/client/webp/');
            if (!file_exists($iconPath)) {
                mkdir($iconPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $icon_name = rand(1, 9999) . time() . '.' . $fileName;
            $request->webp_image->move($iconPath, $icon_name);
            if ($client->webp_image != NULL) {
                unlink($iconPath . $client->webp_image);
            }
            $client->webp_image = $icon_name;
        }
        $client->name = $request->name;
        $client->image_meta_tag = $validatedData['image_meta_tag'];
        $client->updated_at = date('Y-m-d h:i:s');
        if ($client->save()) {
            session()->flash('message', "'Client' has been updated successfully");
            return redirect('admin/client');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_client(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $client = Client::find($request->id);
            if ($client) {
                unlink(public_path('uploads/client/' . $client->image));
                unlink(public_path('uploads/client/webp/' . $client->webp_image));
                $deleted = $client->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }
}
