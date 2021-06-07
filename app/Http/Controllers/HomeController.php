<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Client;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Redirect;
// use DB;
use App\Models\Visit;
use Carbon\Carbon;

// Added By Noman

use Illuminate\Support\Facades\DB as DB;
use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function index(Request $request)
    {
        //fetch patient data
        $starPriority = ['billing' => [], 'high' => [], 'medium' => [], 'low' => [], 'unStarted' => []];
        $patients = Patient::all();
        foreach ($starPriority as $key => $sp) {
            if ($key != 'unStarted') {
                $starPriority[$key] = $patients->where('starpriority', $key)->where('starred', 'yes');
            } else {
                $starPriority[$key] = $patients->where('starred', '<>', 'yes');
            }
        }




        // $records = DB::table('patients')->orderBy('starpriority', 'desc')->get();
        $phoneCall = DB::table('encounters')->select(['patient_id', 'phonecall'])->groupBy('patient_id')->get();
        $phoneCall = $phoneCall->toArray();
        $encounters = function ($id) {
            $thisYearVisits = 0;
            $encount = DB::table('encounters')->where('patient_id', $id);
            $encounter = clone $encount;
            $years = $encount->select('dateyear')->groupBy('dateyear')->get()->toArray();
            $y = [];
            foreach ($years as $k => $year) {
                $yearCount = DB::table('encounters')->selectRaw("count('dateyear') as count")->whereRaw("dateyear = $year->dateyear and patient_id = $id")->get();
                $visitsPerYear = DB::table('encounters')->selectRaw("*")->whereRaw("dateyear=$year->dateyear and patient_id = $id")->get();
                $yearCount = $yearCount->toArray()[0];
                $visitsPerYear = $visitsPerYear->toArray();
                array_push($y, [$year->dateyear, $yearCount, $visitsPerYear]);
            }
            $years = $y;
            $encounter = $encounter->orderBy("encounterdatesort", 'desc')->get();
            foreach ($encounter as $k => $v) {
                if ($k == 0) {
                    $encount = $v;
                }
                if ($v->dateyear == date('Y')) {
                    $thisYearVisits++;
                }
            }
            $encounter = $encount;
            return compact('thisYearVisits', 'encounter', 'years');
        };

        if($request->has('filter')) {
            if($request->input('firstname') != null) {
                foreach ($starPriority as $pKey=>$sp) {
                    $starPriority[$pKey] = $starPriority[$pKey]->where('firstname' , 'like' , '%'.$request->input('firstname').'%');
                }
            }
            if($request->input('lastname') != null) {
                foreach ($starPriority as $pKey=>$sp) {
                    $starPriority[$pKey] = $starPriority[$pKey]->where('lastname' , 'like' , '%'.$request->input('lastname').'%');
                }
            }
            if($request->input('showonly') != null) {
                foreach ($starPriority as $pKey=>$sp) {
                    $starPriority[$pKey] = $starPriority[$pKey]->where('paymenttype' , 'like' , '%'.ucfirst($request->input('showonly')).'%SE%'.'%');
                }
            }
            if($request->input('selectrange') == 'visits') {

                $date_month = $request->input('datemonth');
                if(strlen($request->input('datemonth')) == 1) {
                    $date_month = 0 . $request->input('datemonth');
                }
                $date = $request->input('dateyear').'-'.$date_month.'-'.$request->input('dateday');


                if($request->input('onor') == "On") {

                    foreach ($starPriority as $pKey=>$sp) {

                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '=', $date);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }

                }

                if($request->input('onor') == "On or Before") {

                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '<=', $date);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }

                if($request->input('onor') == "On or After") {
                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '>=', $date);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }
            }
            if($request->input('selectrange') == "lastaccessed") {

                if($request->input('last') == 'Today') {
                    $today_date = Carbon::now()->toDateString();
                    $array = [];
                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '=', $today_date);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }

                if($request->input('last') == 'Yesterday') {
                    $yesterday_date = Carbon::yesterday()->toDateString();
                    $array = [];
                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '=', $yesterday_date);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }
                if($request->input('last') == '3 Days') {
                    $today_date = Carbon::now()->toDateString();
                    $today_date_d = substr($today_date, 8 , 2);

                    if(intval($today_date_d) < 10) {
                        $today_date_d = intval($today_date_d) - 3;
                        $today_date_d = '0' . $today_date_d;
                    }

                    $array = [];
                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '>=', substr($today_date , 0 , 8) . $today_date_d );
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }
                if($request->input('last') == 'Week') {
                    $today_date = Carbon::now()->toDateString();
                    $today_date_d = intval(substr($today_date, 8 , 2));
                    $today_date_m = intval(substr($today_date, 5 , 2));
                    if($today_date_d <= 7) {
                        $today_date_d += 23;
                        $today_date_m -= 1;
                    }
                    if($today_date_m < 10) {
                        $today_date_m = 0 . $today_date_m;
                    }
                    if($today_date_d < 10) {
                        $today_date_d = 0 . $today_date_d;
                    }
                    $array = [];
                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '>=', substr($today_date , 0 , 4) . '-' . $today_date_m . '-' . $today_date_d);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }
                if($request->input('last') == 'Month') {
                    $today_date = Carbon::now()->toDateString();
                    $today_date_m = intval(substr($today_date, 5 , 2));
                    $today_date_d = substr($today_date, 8 , 2);
                    $today_date_y = intval(substr($today_date, 0 , 4));
                    if($today_date_m == 1) {
                        $today_date_y -= 1;
                        $today_date_m = 12;
                    }
                    if($today_date_m < 10) {
                        $today_date_m = 0 . $today_date_m;
                    }
                    $array = [];
                    foreach ($starPriority as $pKey=>$sp) {
                        $array = [];
                        foreach($sp as $pat) {
                            $encounter = $pat->encounters->where('encounterdatesort', '>=', $today_date_y . '-' . $today_date_m . '-' . $today_date_d);
                            if (count($encounter) > 0) {
                                array_push($array, $pat);
                            }
                        }
                        $starPriority[$pKey] = $array;
                    }
                }
            }

        }

        foreach ($starPriority as $key => $sp) {
            $starPriority[$key] = $this->paginate($sp);
        }

        return view('patient.index', compact('starPriority', 'phoneCall', 'encounters'));
    }

    public function scheduler1()
    {
        $records = DB::table('patients')->orderBy('starpriority', 'desc')->get();
        return view('patient.scheduler', compact('records'));
    }

    public function datatable(Request $request)
    {
        //fetch patient data
        $records = DB::select('select * from patients');
        return view('patient.datatable', ['records' => $records]);
    }

    public function portalHome()
    {
        return view('patient.portalhome');
    }



    public function admin()
    {
        $records = DB::select('select * from patients');
        return view(
            'patient.admin',
            compact('records')
        );
    }


    public function algorithm($id)
    {
        $data = Patient::findOrFail($id);
//        $visits = Visit::where('patient_id', $id)->get();

//        $currentVisit = $data->encounters()->where('id', $encId)->get()[0];
        $visits = $data->encounters()->get();

        $yearVisits = [];

        $yearCount = $data->encounters()->selectRaw("count('dateyear') as count, dateyear as year")->groupBy('dateyear')->orderBy('dateyear', 'desc')->get();
        foreach ($yearCount as $k => $year) {
            $year = $year->toArray();
            array_push($yearVisits, $year);
        }

        return view('patient.newencounter', compact('data', 'visits','yearVisits'));
    }

    public function addClient()
    {
        $patients = DB::select('select * from patients');
        $records = DB::select('select * from clients');
        return view(
            'patient.addclient',
            compact('patients', 'records')
        );
    }

    public function insertCleint(Request $request)
    {
        $request->validate([

            //'first_name' =>'required',
            //'last_name' => 'required',
            //'phone'     => 'required',
            //'email'     => 'required',

        ]);
        if (!$request->has('invite_code')) {
            $invite_code = str_random(8);
            $request->request->add(['invite_code' => ($invite_code)]);
        }

        Client::create($request->all());
        return redirect()->route('addclient');
    }
    //return view('patient.addclient')


    public function compare_firstname($patient1 , $patient2){
        return strcmp($patient1["firstname"], $patient2["firstname"]);
    }

    //sort based on patient's firstname 
    public function sort_firstname(){
        $patients = Patient::all()->toArray();

        usort($patients, array($this , "compare_firstname"));
        return $patients;
    }

    public function compare_lastname($patient1 , $patient2){
        return strcmp($patient1["lastname"], $patient2["lastname"]);
    }

    //sort based on patient's lastname 
    public function sort_lastname(){
        $patients = Patient::all()->toArray();

        usort($patients, array($this , "compare_lastname"));
        return $patients;
    }



    public function compare_createdat($patient1 , $patient2){
        if($patient1["created_at"] <= $patient2["created_at"]){
            return 1;
        }
        else{
            return -1;
        }
    }

    //sort based on created_at field
    public function sort_createdat(){
        $patients = Patient::all()->toArray();

        usort($patients, array($this , "compare_createdat"));
        return $patients;
    }

}
