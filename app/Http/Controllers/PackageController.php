<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Models\PackageHistory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class PackageController extends Controller
{

    use SoftDeletes;

    /** Add status by request, if package is deleted then undelete, change package history undeletes.
     * @param Request $request
     * @return RedirectResponse
     */
    public function addStatus(Request $request): RedirectResponse
    {

        $id = $request->input('packageId');
        $package = Package::withTrashed()->find($id);

        if ($package->trashed()) {
            $package->restore();
        }

        PackageHistory::create([
            'packageId' => $id,
            'status' => $request->input('deliveryStatus')
        ]);

        return back();
    }

    /**
     * request customer details based on $id and updates data from fields into textboxes to edit.
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function edit(Request $request)
    {
        $package = Package::withTrashed()->findOrFail($request->input('packageid'));

        $package->update([
            'customerId' => $request->input('customerId'),
            'type' => $request->input('type'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight')
        ]);

        return redirect('/packages/' . $request->input('packageid'));
    }

    /**
     * Find deleted packages based on isTrashed (find customer ID with deleted_at)
     * @param $id
     * @return Application|Factory|View
     */
    public function editView($id)
    {
        return view('packages.edit', [
            'package' => Package::withTrashed()->findOrFail($id)
        ]);
    }

    /**
     * Find all packages (latest)
     * @return Application|Factory|View
     */
    public function index()
    {

        $packages = Package::latest()->get();

        return view('packages.index', [
            'packages' => $packages,
        ]);
    }

    /**
     * Show all packages that have been soft deleted
     *
     * @return Application|Factory|View
     */
    public function indexWithTrashed()
    {
        $packages = Package::onlyTrashed()->latest()->get();

        return view('packages.trashed', [
            'packages' => $packages,
        ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $package = Package::withTrashed()->findOrFail($id);
        return view('packages.show', ['package' => $package]);
    }

    /**
     * @return Application|Factory|View
     */
    public function createorder()
    {
        return view('packages.createorder', [
            'customers' => Customer::all()
        ]);
    }

    /**
     * Creates a new package with senderId and recipientID  and sets the status to Received at Package Handler
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $package = Package::create([
            'senderId' => $request->input('senderId'),
            'recipientId' => $request->input('recipientId'),
            'type' => $request->input('type', 'letter'),
            'length' => $request->input('length', 1),
            'width' => $request->input('width', 1),
            'height' => $request->input('height', 1),
            'weight' => $request->input('weight', 1)
        ]);

        PackageHistory::create([
            'packageId' => $package->id,
            'status' => 'Received at Package Handler'
        ]);

        //return redirect()->back();
        return redirect('/packages')->with('mssg', 'Your order has been placed. Your order number is: ' . $package->id);
    }

    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete($id)
    {
        $package = Package::findOrFail($id);

        PackageHistory::create([
            'packageId' => $package->id,
            'status' => 'Package Deleted'
        ]);

        $package->delete();

        return redirect('/packages');
    }
}
