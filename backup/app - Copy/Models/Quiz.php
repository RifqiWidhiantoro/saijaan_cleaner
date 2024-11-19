<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Quiz extends Model
{
    use HasFactory;
    
    public function community() {
        return $this->belongsTo(Community::class);
    }

    public static function chartOne() {
        return Quiz::all();
        // $schoolId = $_GET['school_id'] ?? null;

        $result = Quiz::select('community_id', 'row_num', DB::raw('count(community_id) as total'), 'school_id', 'c.community')
            ->from(function ($query) {
                $query->select('*', DB::raw('row_number() over(partition by user_id) as row_num'))
                    ->from('quizzes');
            }, 'q')
            ->join('communities as c', 'q.community_id', '=', 'c.id')
            ->groupBy('row_num', 'community_id', 'school_id')
            ->having('row_num', '=', 1)
            ->where('school_id', '=', 1)
            // ->where('school_id', '=', $schoolId)
            ->get();
    }

    public static function chartTwo() {
        return Quiz::all();
        $schoolId = $_GET['school_id'] ?? null;

        $result = Quiz::select('community_id', 'row_num', DB::raw('count(community_id) as total'), 'school_id', 'c.community')
            ->from(function ($query) {
                $query->select('*', DB::raw('row_number() over(partition by user_id) as row_num'))
                    ->from('quizzes');
            }, 'q')
            ->join('communities as c', 'q.community_id', '=', 'c.id')
            ->groupBy('row_num', 'community_id', 'school_id')
            ->having('row_num', '=', 2)
            ->where('school_id', '=', 1)
            // ->where('school_id', '=', $schoolId)
            ->get();
    }

    public static function chartThree() {
        // return Quiz::all();
        $schoolId = $_GET['school_id'] ?? null;

        $result = Quiz::select('community_id', 'row_num', DB::raw('count(community_id) as total'), 'school_id', 'c.community')
            ->from(function ($query) {
                $query->select('*', DB::raw('row_number() over(partition by user_id) as row_num'))
                    ->from('quizzes');
            }, 'q')
            ->join('communities as c', 'q.community_id', '=', 'c.id')
            ->groupBy('row_num', 'community_id', 'school_id')
            ->having('row_num', '=', 3)
            ->where('school_id', '=', 1)
            // ->where('school_id', '=', $schoolId)
            ->get();
    }
}
