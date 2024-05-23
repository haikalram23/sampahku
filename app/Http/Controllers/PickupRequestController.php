<?php

namespace App\Http\Controllers;

use App\Models\PickupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PickupRequestController extends Controller
{
    public function create()
    {
        return view('pickup_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'jenis_sampah' => 'required',
            'berat_sampah' => 'required|numeric',
        ]);

        $pickupRequest = PickupRequest::create([
            'user_id' => Auth::id(),
            'alamat' => $request->alamat,
            'jenis_sampah' => $request->jenis_sampah,
            'berat_sampah' => $request->berat_sampah,
            'status' => 'tunggu',
        ]);

        return redirect()->route('pickup_requests.schedule', $pickupRequest->id);
    }

    public function schedule(PickupRequest $pickupRequest)
    {
        return view('pickup_requests.schedule', compact('pickupRequest'));
    }

    public function updateSchedule(Request $request, PickupRequest $pickupRequest)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
        ]);

        $pickupRequest->update([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);

        return redirect()->route('pickup_requests.status', $pickupRequest->id);
    }

    public function status(PickupRequest $pickupRequest)
    {
        return view('pickup_requests.status', compact('pickupRequest'));
    }

    public function index()
    {
        $pickupRequests = PickupRequest::paginate(5);
        return view('admin.pickup-requests.index', compact('pickupRequests'));
    }

    public function show($id)
    {
        $pickupRequest = PickupRequest::findOrFail($id);
        return view('admin.pickup-requests.show', compact('pickupRequest'));
    }

    public function approve($id)
    {
        $pickupRequest = PickupRequest::findOrFail($id);
        $pickupRequest->status = 'terima';
        $pickupRequest->save();
        return redirect()->back()->with('success', 'Permintaan jemput sampah disetujui.');
    }

    public function reject($id)
    {
        $pickupRequest = PickupRequest::findOrFail($id);
        $pickupRequest->status = 'tolak';
        $pickupRequest->save();
        return redirect()->back()->with('success', 'Permintaan jemput sampah ditolak.');
    }
}
