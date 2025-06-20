<?php

namespace App\Http\Controllers\AdminResto;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestoOperational;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationalController extends Controller
{
    public function index()
    {
        $resto = Restaurant::findOrFail(Auth::user()->resto_id);

        $operationals = RestoOperational::where('resto_id', Auth::user()->resto_id)
            ->orderByRaw("FIELD(days, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")->get();

        return view('admin-resto.operational.index', compact('resto', 'operationals'));
    }

    public function update(Request $request)
    {
        $restoId = Auth::user()->resto_id;

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        foreach($days as $day)
        {
            $isClosed = $request->input("is_closed.$day", 0);
            if($isClosed)
            {
                $data = ['is_closed'=>1, 'open_time'=>$request->input("open_time.$day")?:'08:00', 'close_time'=>$request->input("close_time.$day")?:'22:00'];
            } else {
                $data = ['open_time'=>$request->input("open_time.$day")?:'08:00', 'close_time'=>$request->input("close_time.$day")?:'22:00', 'is_closed'=>0];
            }

            RestoOperational::updateOrCreate(['resto_id'=>$restoId, 'days'=>$day], $data);
            return redirect()->route('admin-resto.operational.index')->with('success', 'Operational hours updated successfully!');
        }
    }
}
