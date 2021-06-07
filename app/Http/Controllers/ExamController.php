<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class ExamController extends Controller
{
	public function examRoms($id)
	{
	    $data = Patient::findOrFail($id);
        //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();
        $exam = Exam::where('patient_id', '=' ,$id)->first();
        if($exam){
            return view('patient.examsrom',compact('data','exam'));
        } else {
            return view('patient.examsromedit',compact('data'));
        }
    }



	public function insertExamroms(Request $request)
    {
        $input = $request->all();

        // id as patient id
        $exam = Exam::where('patient_id','=', $request->patient_id)->first();
        //create record if empty
        if($exam == null) {

            $article = Exam::create($request->all());
        	return Redirect::back()->with('success', 'Visit has been added!');
        } else {    //update previous record

            $input = $request->all();
            $data = $exam->update($input);
            return Redirect::back()->with('success', 'Insurance Information of patient has been saved successfully!');
        }
    }


    public function examsPosture($id)
    {
        $data = Patient::findOrFail($id);
        //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();
        $exam = Exam::where('patient_id', '=' ,$id)->first();
        if($exam){
            return view('patient.examsposture',compact('data','exam'));
        } else {
            return view('patient.examspostureedit',compact('data'));
        }
    }


    public function insertexamposture(Request $request)
    {
        $input = $request->all();

        // id as patient id
        $exam = Exam::where('patient_id','=', $request->patient_id)->first();
        //create record if empty
        if($exam == null) {

            $article = Exam::create($request->all());
            return Redirect::back()->with('success', 'Visit has been added!');
        } else {    //update previous record

            $input = $request->all();
            $data = $exam->update($input);
            return Redirect::back()->with('success', 'Insurance Information of patient has been saved successfully!');
        }
    }


    public function examsAll($id)
    {
        $data = Patient::findOrFail($id);
        //$exam = Exam::where('patient_id', '=' ,$id)->firstOrFail();

        return view('patient.examsall',compact('data'));

    }


    public function document($id)
    {
        $data = Patient::findOrFail($id);
        return view('patient.document',compact('data'));

    }

    public function autoAccidentform($id)
    {
        $data = Patient::findOrFail($id);
        return view('patient.autoaccidentform',compact('data'));

    }

    public function examsOther($id)
    {
        $data = Patient::findOrFail($id);
        return view('patient.examsother',compact('data'));

    }
}
