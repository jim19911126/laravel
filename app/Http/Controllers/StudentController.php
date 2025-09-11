<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=[
        //     [
        //         'id'=>'1',
        //         'name'=>'David',
        //     ],
        //     [
        //         'id'=>'2',
        //         'name'=>'John',
        //     ],
        //     [
        //         'id'=>'3',
        //         'name'=>'Mary',
        //     ],
        // ];
        // $data = DB::select('select * from students');
        // get() 會回傳 collection
        $data = DB::table('students')->get();
        // first() 會回傳單一物件
        // $data = DB::table('students')->where('id', 2)->get();

        // dd($data);

        return view('student.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('create method called');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // dd('edit method called');
        return view('student.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function excel()
    {
        dd('excel method called');
        // return view('student.excel');
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
}