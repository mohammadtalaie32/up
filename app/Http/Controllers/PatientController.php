<?php

namespace App\Http\Controllers;

use App\Models\Encounter;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * NewPatient Page
     */
    public function newPatient()
    {
        $records = Patient::select('id', 'firstname', 'lastname')->cursor();
        return view('patient.newpatient', compact('records'));
    }

    /**
     * Register newPatient
     */
    public function insertNewpatient(Request $request)
    {
        $request->validate([]);

        if (!$request->has('password')) {
            $password = str_random(8);
            $request->request->add(['password' => ($password)]);
        }

        $dob = $request->dobmonth . '-' . $request->dobday . '-' . $request->dobyear;
        $request->request->add(['dob' => $dob]);
        unset($request->dobmonth);
        unset($request->dobday);
        unset($request->dobyear);

        Patient::create($request->all());

        return Redirect::back()->with('success', 'Patient has been registered successfully!');
    }

    /**
     * Patient Star
     */
    public function starSubmit(Request $r)
    {
        $id = $r->id;
        $p = Patient::find($id);
        $p->starred = $r->starred;
        $p->starpriority = $r->starpriority;
        $p->starnotes = $r->starnotes;
        $p->save();
        return "done";
    }

    /**
     * Insurance Page
     */
    public function insuranceInfo($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.insuranceinfo', compact('data', 'visits', 'yearVisits'));
    }

    public function billing($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->orderBy('id')->get();

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();

        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.billing', compact('data', 'visits', 'yearVisits'));
    }

    /**
     * Delete Patient
     */
    public function deletePatient(Request $r)
    {
        Patient::findOrFail($r->id)->delete();
        return $r->id;
    }

    /**
     * Delete Visit
     */
    public function deleteVisit(Request $r)
    {
        Encounter::findOrFail($r->id)->delete();
        return $r->id;
    }

    /**
     * Edit PatientInfo
     */
    public function edit($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();
        $records = DB::select('select * from patients');

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.patientinfo', compact('data', 'visits', 'records', 'yearVisits'));
    }


    /**
     * Manage Patient
     */
    public function manage($id, $year = '')
    {
        // dd($id);
        $data = Patient::findOrFail($id);
        if ($year) {
            $visits = $data->encounters()->where('dateyear', $year)->orderBy('id')->get();
        } else {
            $visits = $data->encounters()->orderBy('id')->get();
        }

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return Redirect::back()->with(compact('data', 'visits', 'yearVisits'));
        return view('patient.manage', compact('data', 'visits', 'yearVisits'));
    }

    /**
     * Patient's social History
     */
    public function socialHistory($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.socialhistory', compact('data', 'visits', 'yearVisits'));
    }

    public function preexistingConditions($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();
        $preexisting = explode(",", $data->preexisting);

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.preexistingconditions', compact('data', 'preexisting', 'visits', 'yearVisits'));
    }

    /**
     * Change Bill status
     * POST method
     */
    public function changeBill(Request $r)
    {
        $id = $r->id;
        $status = $r->status;
        $encounter = \App\Encounter::findOrFail($id);
        $encounter->billing = $status;
        $encounter->save();
    }

    /**
     * Get Family History
     */
    public function familyHistory($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }

        $mother = explode(",", $data->Mother);
        $father = explode(",", $data->Father);
        $sister = explode(",", $data->Sisters);
        $brother = explode(",", $data->Brothers);
        $children = explode(",", $data->Children);
        //dd( $preexisting);
        //exit;
        return view(
            'patient.familyhistory',
            compact(
                'data',
                'mother',
                'father',
                'sister',
                'brother',
                'children',
                'visits',
                'data',
                'visits',
                'yearVisits'
            )
        );
    }

    /**
     * Update Family History
     */
    public function updateFamily($id)
    {
        $request = new Request();
        $request->merge([
            'Mother'    => implode(',', (array) $request->get('Mother')),
            'Father'    => implode(',', (array) $request->get('Father')),
            'Sisters'   => implode(',', (array) $request->get('Sisters')),
            'Brothers'  => implode(',', (array) $request->get('Brothers')),
            'Children'  => implode(',', (array) $request->get('Children')),
        ]);
        $input = $request->all();
        // dd($input);
        $user =  Patient::findOrFail($id);
        $user->Mother = $request->get('Mother');
        $user->Father = $request->get('Father');
        $user->Sisters = $request->get('Sisters');
        $user->Brothers = $request->get('Brothers');
        $user->Children = $request->get('Children');
        $user->save();

        return Redirect::back()->with('success', 'Family History of patient has been saved successfully!');
    }

    public function patientInfo(Request $request, $id)
    {
        $user =  Patient::findorfail($id);

        $input = $request->except([
            'patientphoto'
        ]);


        //move | upload file on server
        if ($request->patientphoto) {
            $file      = $request->file('patientphoto');
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename  = 'patientphoto-' . time() . '.' . $extension;
            $file->move('uploadimages', $filename);
            $input['patientphoto'] = $filename;
        }

        //Patient::delete( public_path('/uploadimages' . $request->patientphoto));

        $data = $user->update($input);

        return Redirect::back()->with('success', 'Insurance Information of patient has been saved successfully!');
    }

    public function UdateSocialhistory(Request $request, $id)
    {
        $input = $request->all();
        $user =  Patient::findorfail($id);
        $data = $user->update($input);
        return Redirect::back()->with('success', 'Social History of patient has been saved successfully!');
    }

    public function updatePreexistingconditions(Request $request, $id)
    {
        $request->merge([
            'preexisting'    => implode(',', (array) $request->get('preexisting')),
        ]);

        $input = $request->all();
        $user =  Patient::findorfail($id);
        $data = $user->update($input);
        return Redirect::back()->with('success', 'Pre existing conditions of patient has been saved successfully!');
    }

    public function udateInsuranceinfo(Request $request, $id)
    {
        $input = $request->all();
        $user =  Patient::findorfail($id);
        $data = $user->update($input);
        return Redirect::back()->with('success', 'Social History of patient has been saved successfully!');
    }

    public function deletePhoto($id)
    {
        $imagePath = Patient::select('patientphoto')->where('id', $id)->first();

        $filePath = $imagePath->patientphoto;
        if (file_exists($filePath)) {
            unlink($filePath);

            Patient::where('id', $id)->delete();
        } else {

            Patient::where('id', $id)->delete();
        }

        return Redirect::back()->with('success', 'Pre existing conditions of patient has been saved successfully!');
    }
}
