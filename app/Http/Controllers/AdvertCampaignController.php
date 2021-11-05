<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\AdvertCampaign;
use App\Models\AdvertCampaignImage;

class AdvertCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdvertCampaign::with('images')->orderBy('id', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json(['status' => 'created'], 201);
        try{
            $validated = $request->validate( [
                'name' => 'required|max:255',
                'budget_total' => 'required',
                'budget_daily' => 'required',
                'to' => 'required',
                'from' => 'required',
            ]);

            $data = [
                'name' => $request->get('name'),
                'currency' => $request->get('currency', 'USD'),
                'budget_total' => $request->get('budget_total'),
                'budget_daily' => $request->get('budget_daily'),
                'status' => $request->get('status', 'PUBLISHED'),
                'to' => $request->get('to'),
                'from' => $request->get('from'),
            ];

            $ad = AdvertCampaign::create($data);
            $images = [];
            if($request->hasFile('images')){
                foreach($request->file('images') as $file){
                    $name = time() .'.'. strtolower($file->getClientOriginalExtension());
                    $file->storeAs('public/images', $name);
                    $images[] = AdvertCampaignImage::create(['advert_campaign_id' => $ad->id, 'image_name' => $name]);
                }
            }
            $ad['images'] = $images;
            return response()->json($ad, 201);
        }catch(Exception $e){
            error_log($e);
            return response()->json($e, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvertCampaign  $advertCampaign
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertCampaign $advertCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvertCampaign  $advertCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertCampaign $advertCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertCampaign  $advertCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertCampaign $advertCampaign)
    {
        //
        $advertCampaign->update($request->all());

        return response()->json($advertCampaign, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertCampaign  $advertCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertCampaign $advertCampaign)
    {
        $advertCampaign->delete();

        return response()->json(null, 204);
    }
}
