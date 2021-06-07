<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\Encounter;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Specific visit Progress Notes
     * @param int $id Patient id
     * @param int $encId Encounter id
     */
    public function progressNotes($id, $encId)
    {
        $data = Patient::findOrFail($id);
        $currentVisit = $data->encounters()->where('id', $encId)->get()[0];
        $visits = $data->encounters()->get();

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.progressnotes', compact('data', 'visits', 'yearVisits', 'currentVisit'));
    }
    // progress
       public function progress($id,$data=null)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();
        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.progress', compact('data','visits', 'yearVisits'));
    }

    /**
     * Daily coding
     * @param int $id Patient id
     * @param int $encId Encounter id
     */
    public function assessmentICD($id, $encId)
    {
        $data = Patient::findOrFail($id);

        $currentVisit = $data->encounters()->where('id', $encId)->get()[0];

       $visits = $data->encounters()->get();

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }

        return view('patient.assessmenticd', compact('data', 'visits', 'yearVisits', 'currentVisit'));
    }

    /**
     * Update billing for a visit
     * @param int $id Visit
     */
    public function updateBilling($id)
    {
        $visit = Encounter::findOrFail($id);
        if (request()->billing != 'undefined') {
            $visit->billing = request()->billing;
        }
        $visit->billingclaimnumber = request()->billingclaimnumber;
        $visit->billingdatesent = request()->billingdatesent;
        $visit->billingamount = request()->billingamount;
        $visit->billingnotes = request()->billingnotes;
        $visit->save();
    }

    /**
     * Update billing for a visit
     * @param int $id Visit
     */
    public function updatePayment($id)
    {
        $visit = Encounter::findOrFail($id);
        if (request()->payment != 'undefined') {
            $visit->payment = request()->payment;
        }
        $visit->billingpaid = request()->billingpaid;
        $visit->paymentnotes = request()->paymentnotes;
        $visit->save();
    }

    /**
     * New visit page
     * @param int $id Patient id
     */
    public function newEncounter($id)
    {
        $data = Patient::findOrFail($id);
        $visits = $data->encounters()->get();

        // $exam = Visit::where('patient_id', '=', $id)->first();
        // $visits = DB::select('select * from visits where patient_id' . '= ' . $id);
        // $encounter = DB::table('visits')
        //     ->join('encounters', 'visits.id', '=', 'encounters.visit_id')
        //     ->get();

        // if ($exam) {
        //     return view('patient.newencounteredit', compact('data', 'exam', 'visits', 'encounter'));
        // } else {
        // }

        $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
        return view('patient.newencounter', compact('data', 'visits', 'yearVisits'));
    }


    public function insertCounter(Request $request)
    {
        // id as patient id
        $exam = Visit::where('patient_id', '=', $request->patient_id)->first();

        foreach ($request->addmore as $key => $value) {
            Visit::create($value);
        }
        return Redirect::back()->with('success', 'Insurance Information of patient has been saved successfully!');
    }

    public function insertCounteredit(Request $request)
    {
        // id as patient id
        $exam = Visit::where('patient_id', '=', $request->patient_id)->first();

        //$visit = DB::table('visits')->get();

        $visit = Encounter::where('visit_id', '=', $request->visit_id)->first();

        if ($visit == null) {
            Encounter::create($request->except(['addmore']));
        } else {
            foreach ($request->addmore as $key => $value) {
                Visit::create($value);
            }
        }

        return Redirect::back()->with('success', 'Insurance Information of patient has been saved successfully!');
    }


    /*public function encounterDate($id)
    {
        $data = Visit::findOrFail($id);

        $encounter = Encounter::where('visit_id', '=' ,$id)->first();

        if($exam){
            return view('patient.newencounteredit',
                compact('visit',
                    'encounter'
            ));
        }
    }*/
}
