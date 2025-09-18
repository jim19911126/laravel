<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Phone;
use App\Models\Hobby;
use NunoMaduro\Collision\Adapters\Phpunit\Style;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Student::with('phoneRelation','hobbiesRelation')->get();
        // $studentHobbies = $data[0]->hobbiesRelation;
        // dd($studentHobbies);

        // $data = DB::select('select * from students');
        // get() 會回傳 collection
        // $data = DB::table('students')->get();
        // first() 會回傳單一物件
        // $data = DB::table('students')->where('id', 2)->get();

        // dd($data);

        foreach($data as $key=>$value){
            $dataHobbies = $value->hobbiesRelation;
            // $hobbyString = '';
            $hobbyArr = [];
            foreach($dataHobbies as $k=>$v){
                array_push($hobbyArr, $v->hobby_name);
            };

            $hobbyString = join(',', $hobbyArr);
            $data[$key]['hobbyString'] = $hobbyString;
        
        }
        return view('student.index', ['data' => $data]);
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('create method called');
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input=$request->except('_token');
        // dd($input);

        // 主表
        $data=new Student;
        $data->name=$input['name'];
        $data->save();

        // 子表
        $dataPhone=new Phone;        
        $dataPhone->student_id=$data->id;
        $dataPhone->phone_number=$input['phone'];
        $dataPhone->save();

        // hobby子表
        $hobbyArr = explode(',', $input['hobbies']);
        foreach($hobbyArr as $k=>$v){
            $dataHobby=new Hobby;        
            $dataHobby->student_id=$data->id;
            $dataHobby->hobby_name=$v;
            $dataHobby->save();
        }
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Student::with('phoneRelation','hobbiesRelation')->find($id);

        $dataHobbies = $data->hobbiesRelation;
        // $hobbyString = '';
        $hobbyArr = [];
        foreach($dataHobbies as $k=>$v){
            array_push($hobbyArr, $v->hobby_name);
        }

        $hobbyString = join(',', $hobbyArr);
        $data['hobbyString'] = $hobbyString;
        // dd('edit method called');
        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input=$request->except(['_token']);

        // 抓主表資料
        $data=Student::find($id);
        $data->name=$input['name'];
        $data->save();

        // 刪除舊的子表資料
        Phone::where('student_id', $data->id)->delete();

        // 新增子表資料
        $dataPhone=new Phone;        
        $dataPhone->student_id=$data->id;
        $dataPhone->phone_number=$input['phone'];
        $dataPhone->save();

        // 刪除舊的興趣子表資料
        Hobby::where('student_id', $data->id)->delete();

        // 新增興趣子表資料
        $hobbyArr = explode(',', $input['hobbies']);
        foreach($hobbyArr as $k=>$v){
            $dataHobby=new Hobby;        
            $dataHobby->student_id=$data->id;
            $dataHobby->hobby_name=$v;
            $dataHobby->save();
        }
        
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 刪除舊的子表資料
        Phone::where('student_id', $id)->delete();

        // 刪除主表資料
        Student::where('id', $id)->delete();

        // 刪除舊的興趣子表資料
        Hobby::where('student_id', $id)->delete();

        // 回到主畫面
        return redirect()->route('students.index');
        // dd('destroy method called');
    }

    public function excel()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function test()
    {
        // dd('test method called');
        $data='test ok';

        $data=[
            [
                'id'=>'1',
                'name'=>'David',
            ],
            [
                'id'=>'2',
                'name'=>'John',
            ],
            [
                'id'=>'3',
                'name'=>'Mary',
            ],
        ];
        return view('student.test', ['data' => $data]);
    }

    public function child(){
        // dd('child method called');
        return view('student.child');

    }

        public function php(){
        // dd('php method called');
        return view('student.php');

    }

        public function python(){
        // dd('python method called');
        return view('student.python');

    }

            public function js(){
        // dd('js method called');
        return view('student.js');

    }

        public function html(){
        // dd('html method called');
        return view('student.html');

    }

    public function gaga(){
        // dd('child method called');
        return view('try.gaga');

    }
}