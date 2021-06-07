<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\SOAP;
use App\Models\Exam;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class SOAPController extends Controller
{

	public function soap($id,$date=null)
    {
    //$data = Visit::find($id);
    	$data = Patient::findOrFail($id);
      //  $visit = Visit::where('patient_id', '=' ,$id)->first();
     //dd($visit);
       // $exit;
        //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();

        $exam = SOAP::where('visit_id',$id)->first();
        dd($exam);
        if($exam){
            $improved = explode(",", $exam->Improved);
            $worsened = explode(",", $exam->Worsened);
            return view('patient.subjective',compact('data','exam','improved','worsened'));
        } else {
            return view('patient.subjectiveedit',compact('data'));
        }
    }


    public function subjective($id,$date=null)
    {

    	$data = Patient::findOrFail($id);
    // 	$enc=$data->encounters()->where('encounterdate','');
    // 	dd($enc);
        //$soap = Visit::findOrFail($id);
    	//$records = soap::where('patient_id', $id)->get();


    // 	$visits = soap::where('visit_id', $id)->get();
    // 	$visits = Visit::all();

    $exam = SOAP::where('patient_id',$id)->first();
    //  dd($exam);
        // $exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();

        if($exam){
            $improved = explode(",", $exam->Improved);

            $worsened = explode(",", $exam->Worsened);
            return view('patient.subjective',compact('data',
                'exam','improved','worsened'

            )
        );

        } else {
            return Redirect::back()->with(compact('data'));
            return view('patient.subjectiveedit',compact('data'));
        }


        // $data = Patient::findOrFail($id);
        // //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();
        // $exam = SOAP::where('patient_id', '=' ,$id)->first();
        // if($exam){
        //     return view('patient.exercises',compact('data','exam'));
        // } else {
        //     return view('patient.exercises',compact('data'));
        // }

    }


    public function insertSoap(Request $request)
    {
    	$request->merge([
        'Improved'    => implode(',', (array) $request->get('Improved')),
        'Worsened'    => implode(',', (array) $request->get('Worsened')),
        'chiefcomplaints'    => implode(',', (array) $request->get('chiefcomplaints')),

        ]);

        $input = $request->all();

        // id as patient id
        $exam = SOAP::where('visit_id','=', $request->visit_id)->first();


        //create record if empty
        if($exam == null) {

            $article = SOAP::create($request->all());
            return Redirect::back()->with('success', 'Visit has been added!');
        } else {    //update previous record

            $input = $request->all();
            $data = $exam->update($input);
            return Redirect::back()->with('success', 'Insurance Information of patient has been saved successfully!');
        }
    }


    public function dailyCoding($id)
    {
          $data = Patient::findOrFail($id);
           $visits = $data->encounters()->get();
           $yearVisits = [];
        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }
//   dd($data);
            return view('patient.test',compact('data','visits','yearVisits'));


    }


    public function exercises($id)
    {
        $data = Patient::findOrFail($id);
        //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();
        $exam = SOAP::where('patient_id', '=' ,$id)->first();
        if($exam){
            return view('patient.exercises',compact('data','exam'));
        } else {
            return view('patient.exercises',compact('data'));
        }
    }


    public function exerciseEditor($id)
    {
        $data = Patient::findOrFail($id);
        //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();
        $exam = SOAP::where('patient_id', '=' ,$id)->first();
        if($exam){
            return view('patient.exerciseeditor',compact('data','exam'));
        } else {
            return view('patient.exerciseeditor',compact('data'));
        }
    }
}
