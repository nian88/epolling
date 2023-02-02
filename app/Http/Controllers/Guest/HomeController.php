<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Polling;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $questions = Question::published()->get();
        return view('pages.guest.home', compact('questions'));
    }

    public function aboutus(Request $request){
        return view('pages.guest.aboutus');
    }

    public function polling(Request $request, $id){
        $question = Question::where(['id' => $id])->first();
        return view('pages.guest.polling', compact('question'));
    }

    public function vote(Request $request, $id, $value){
        try {
            DB::beginTransaction();
            Polling::where(['question_id' => $id])->increment("{$value}", 1);
        }catch (\Throwable $e){
            echo $e->getMessage();
            DB::rollBack();
        }
        DB::commit();
        return redirect(route('summary', $id));
    }

    public function summary(Request $request, $id){
        $question = Question::with('polling')->where(['id' => $id])->first();

        $data['label'][] = $question->option_1;
        $data['data'][] = $question->polling->option_1;

        $data['label'][] = $question->option_2;;
        $data['data'][] = $question->polling->option_2;

        $data['label'][] = $question->option_3;
        $data['data'][] = $question->polling->option_3;


        $chart_data = json_encode($data);
        return view('pages.guest.chart', compact('question', 'chart_data'));
    }
}
