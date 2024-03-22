<?php

namespace App\Http\Controllers;


use App\Website;
use App\WebsiteDetail;

use Illuminate\Http\Request;

class WebsiteMakeController extends Controller
{
    public function storeWebsite(Request $request)
    {
        // dd($request->all());
        try {
            $check = Website::where('id_event', $request->id_event)->first();
            if (!$check) {
                if ($request->image != null) {
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->extension();
                    $image->move(public_path('website-banner/'), $filename);
                }
                $website = Website::create([
                    'id_event' => $request->id_event,
                    'image' => $filename ? $filename : null,
                ]);
            } else {
                if (file_exists('website-banner/' . $check->image)) {
                    $delete = unlink('website-banner/' . $check->image);
                }
                if ($request->image != null) {
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->extension();
                    $image->move(public_path('website-banner/'), $filename);
                }
                $website = Website::where('id_event', $request->id_event)->update([
                    'image' => $filename ? $filename : null,
                ]);
            }
            $data = Website::where('id_event', $request->id_event)->first();
            $data2 = WebsiteDetail::where('website_id', $data->id)->get();
            return response()->json(['status' => true, 'website' => $data, 'websiteDetails' => $data2]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function getWebsite(Request $request)
    {
        try {
            $website = Website::where('id_event', $request->id_event)->first();
            $websiteDetails = WebsiteDetail::where('website_id', $website->id)->first();
            $canvas = json_decode($websiteDetails->element);
            return response()->json(['status' => true, 'website' => $website, 'websiteDetails' => $websiteDetails, 'canvas' => $canvas]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function saveWebsite(Request $request)
    {
        try {
            $website = Website::where('id_event', $request->id_event)->first();
            if (!$website) {
                $website = Website::create([
                    'id_event' => $request->id_event,
                ]);
            }

            $check = WebsiteDetail::where('website_id', $website->id)->first();
            if (!$check) {
                WebsiteDetail::create([
                    'website_id' => $website->id ? $website->id : null,
                    'element' => json_encode($request->elements),
                ]);
            } else {
                $data = WebsiteDetail::where('website_id', $website->id)->update([
                    'element' => json_encode($request->elements)
                ]);
            }
            $websiteDetails = WebsiteDetail::where('website_id', $website->id)->first();
            return response()->json(['status' => true, 'websiteDetails' => $websiteDetails]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function storeCounter(Request $request)
    {
        // dd('here');
        try {
            $website = Website::where('id_event', $request->id_event)->first();
            if (!$website) {
                $website = Website::create([
                    'is_counter' => $request->counter,
                    'id_event' => $request->id_event,
                ]);
            } else if ($website) {
                $website->update([
                    'is_counter' => $request->counter,
                ]);
                $website->refresh();
            }
            return response()->json(['status' => true, 'website' => $website]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateWebsite(Request $request)
    {
        try {
            $website = Website::where('id_event', $request->id_event)->first();
            $websiteDetails = WebsiteDetail::where('website_id', $website->id)->get();
            if ($websiteDetails) {
                WebsiteDetail::where('website_id', $website->id)->delete();
            }
            $websiteDetails = WebsiteDetail::where('website_id', $website->id)->first();
            return response()->json(['status' => true, 'websiteDetails' => $websiteDetails]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function uploadImage(Request $request, $id)
    {
        // dd($request->all(), $id);
        if (!file_exists('public/event-images/' . $request->idevent . '/photogallery')) {
            mkdir('public/event-images/' . $request->idevent . '/photogallery', 0777, true);
        }


        $photogallery = new \App\Photogallery;
        $photogallery->id_event = $id;
        $photogallery->save();

        $image = $request->file('image');
        $filename = $photogallery->id_photogallery . '.' . 'jpg';
        $image->move(public_path('event-images/' . $id . '/photogallery'), $filename);
        return redirect()->back();
    }
}
