<?php
namespace App\Repository\Invoices;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Invoices\InvoicesRepositoryInterface;

class InvoicesRepository implements InvoicesRepositoryInterface
{
    public function index()
    {
        $Invoices = Invoice::all();
        return view('dashboard.invoices.index',compact('Invoices'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $sections = Section::all();
        $services = Service::all();
        return view('dashboard.invoices.add',compact('patients','doctors','sections','services'));
    }


    public function store($request)
    {
        DB::beginTransaction();

        try {

            $Invoices = new Invoice();
            $Invoices->email = $request->email;
            $Invoices->password = Hash::make($request->password);
            $Invoices->section_id = $request->section_id;
            $Invoices->phone = $request->phone;
            $Invoices->status = 1;
            $Invoices->save();

            // store trans
            $doctors->name = $request->name;
            $doctors->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.create');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    } 
    public function update($request)
    {
        DB::beginTransaction();

        try {

            $doctor = Doctor::findorfail($request->id);

            $doctor->email = $request->email;
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->save();
            // store trans
            $doctor->name = $request->name;
            $doctor->save();

            DB::commit();
            session()->flash('edit');
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {   
        Invoice::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('doctors.index');
    }

    public function edit($id)
    {
        $sections = Invoice::all();
        $doctor = Doctor::findorfail($id);
        return view('Dashboard.Doctors.edit',compact('sections','doctor'));

    }
}
