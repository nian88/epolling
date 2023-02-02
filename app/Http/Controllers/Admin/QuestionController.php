<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Polling;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index(Request $request){
        $questions = Question::get();
        return view('pages.admin.question.index', compact('questions'));
    }

    public function add(Request $request){
        return view('pages.admin.question.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'question'     => 'required|min:2',
            'option_1'       => 'required|min:2',
            'option_2'       => 'required|min:2',
            'option_3'       => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            DB::beginTransaction();
            $question = Question::create($validator->validated());
            Polling::create(['question_id' => $question->id]);
        }catch (\Throwable $e){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(["error" => $e->getMessage()]);
        }
        DB::commit();
        return redirect(route('question.list'));
    }

    public function detail(Request $request, $id){
        $question = Question::where(['id' => $id])->first();
        return view('pages.admin.question.detail', compact('question'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'question'     => 'required|min:2',
            'option_1'     => 'required|min:2',
            'option_2'     => 'required|min:2',
            'option_3'     => 'required|min:2',
            'is_publish'   => ''
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        try {
            $data = [
                'question'     => $validator->validated()['question'],
                'option_1'     => $validator->validated()['option_1'],
                'option_2'     => $validator->validated()['option_2'],
                'option_3'     => $validator->validated()['option_3'],
                'is_publish'   => $request->has('is_publish')
            ];

            DB::beginTransaction();
            $question = tap(Question::where(['id' => $id]))->update($data)->first();
        }catch (\Throwable $e){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(["error" => $e->getMessage()]);
        }
        DB::commit();

        return view('pages.admin.question.detail', compact('question'));
    }

    public function destroy(Request $request, $id){
        Question::where(['id' => $id])->delete();
        return redirect(route('question.list'));
    }

    public function print(Request $request){
        $questions = Question::get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.print', ["questions" => $questions]);
        return $pdf->stream('cetak.pdf');
    }
}
