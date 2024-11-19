<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Quiz;
use Illuminate\Http\Request;
use DB;

class ChartController extends Controller
{
    public function chart(Request $request) 
    {
        // $schoolId = $request->query('school_id', 0); 

        // if ($schoolId == 0) {
        //     $result = DB::select(DB::raw("
        //         SELECT c.community, COUNT(*) AS quiz_count
        //         FROM quizzes q
        //         JOIN communities c ON q.community_id = c.id
        //         WHERE q.id IN (
        //             SELECT MIN(q2.id)
        //             FROM quizzes q2
        //             GROUP BY q2.user_id
        //         )
        //         GROUP BY c.id, c.community
        //     "));
        // } else {
        //     $result = DB::select(DB::raw("
        //         SELECT c.community, COUNT(*) AS quiz_count
        //         FROM quizzes q
        //         JOIN communities c ON q.community_id = c.id
        //         WHERE q.school_id = :schoolId AND q.id IN (
        //             SELECT MIN(q2.id)
        //             FROM quizzes q2
        //             WHERE q2.user_id = q.user_id
        //             GROUP BY q2.user_id
        //         )
        //         GROUP BY c.id, c.community
        //     "), ['schoolId' => $schoolId]);
        // }

        $chartOne = Quiz::chartOne();
        $chartTwo = Quiz::chartTwo();
        $chartThree = Quiz::chartThree();
       
        $labels = [];
        $dataPoints = [];
        // foreach ($result as $val) {
        //     $labels[] = $val->community;
        //     $dataPoints[] = $val->quiz_count;
        // }
        $labelsString = "['" . implode("', '", $labels) . "']";
        $dataPointsString = "[" . implode(", ", $dataPoints) . "]";

        // Query tambahan untuk menampilkan nama komunitas dan jumlah pilihan yang dipilih user.
        
        // $communityChoices = DB::table('quizzes')
        // ->join('communities', 'quizzes.community_id', '=', 'communities.id')
        // ->select('communities.community', DB::raw('COUNT(quizzes.id) as jumlah_pilihan'))
        // ->groupBy('communities.community')
        // ->orderBy('jumlah_pilihan', 'desc') 
        // ->get();

        $school = School::all();

        // return $result;
        // return $chartOne = Quiz::chartOne();
        // return view('layouts.idea.grafik', compact('labelsString', 'dataPointsString', 'school', 'result'));
        // return [$labelsString, $dataPointsString, $school, $result, $chartOne, $chartOne, $chartThree];
        return [$labelsString, $dataPointsString, $school, $chartOne, $chartOne, $chartThree];

        // return $chartOne = School::grafik_01();
        // return response()->json([
        //     'result' => $result,
        //     'labels' => $labels,
        //     'dataPoints' => $dataPoints
        // ]);
    }
}



















// di atas ini query pindah ke model dan di sini hannya variable dan return





// GRAFIK SEBELUM DI MODEL

// <?php

// namespace App\Http\Controllers;

// use App\Models\School;
// use Illuminate\Http\Request;
// use DB;

// class ChartController extends Controller
// {
//     public function chart(Request $request) 
//     {
//         $schoolId = $request->query('school_id', 0); 

//         if ($schoolId == 0) {
//             $result = DB::select(DB::raw("
//                 SELECT c.community, COUNT(*) AS quiz_count
//                 FROM quizzes q
//                 JOIN communities c ON q.community_id = c.id
//                 WHERE q.id IN (
//                     SELECT MIN(q2.id)
//                     FROM quizzes q2
//                     GROUP BY q2.user_id
//                 )
//                 GROUP BY c.id, c.community
//             "));
//         } else {
//             $result = DB::select(DB::raw("
//                 SELECT c.community, COUNT(*) AS quiz_count
//                 FROM quizzes q
//                 JOIN communities c ON q.community_id = c.id
//                 WHERE q.school_id = :schoolId AND q.id IN (
//                     SELECT MIN(q2.id)
//                     FROM quizzes q2
//                     WHERE q2.user_id = q.user_id
//                     GROUP BY q2.user_id
//                 )
//                 GROUP BY c.id, c.community
//             "), ['schoolId' => $schoolId]);
//         }

       
//         $labels = [];
//         $dataPoints = [];
//         foreach ($result as $val) {
//             $labels[] = $val->community;
//             $dataPoints[] = $val->quiz_count;
//         }
//         $labelsString = "['" . implode("', '", $labels) . "']";
//         $dataPointsString = "[" . implode(", ", $dataPoints) . "]";

//         // Query tambahan untuk menampilkan nama komunitas dan jumlah pilihan yang dipilih user.
        
//         $communityChoices = DB::table('quizzes')
//         ->join('communities', 'quizzes.community_id', '=', 'communities.id')
//         ->select('communities.community', DB::raw('COUNT(quizzes.id) as jumlah_pilihan'))
//         ->groupBy('communities.community')
//         ->orderBy('jumlah_pilihan', 'desc') 
//         ->get();

//         $school = School::all();

 
        
    
//         return view('layouts.idea.  grafik', compact('labelsString', 'dataPointsString', 'school', 'result'));
//         // return [$labelsString, $dataPointsString, $school, $result'];

//         // return $grafik1 = School::grafik_01();
//     }
// }

