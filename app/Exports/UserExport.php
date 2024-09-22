<?php

namespace App\Exports;

use App\Models\Question;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;

class UserExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $list = [];
        
        // Header row with static values
        $headerRow = [
            'الاسم', 
            'البريد الإلكتروني',
            'رقم الهوية',
            'العمل',
            'الدراسة',
            'تاريخ الميلاد',
            'مكان الاقامه',
            'تاريخ الإنشاء'
        ];
    
        // Fetching questions
        $questions = Question::all()->pluck('question', 'id');
    
        // Add question headers to the header row
        foreach ($questions as $questionId => $question) {
            $headerRow[] = $question;
        }
    
        $list[] = $headerRow;
    
        // Fetching users and adding data rows
        $users = User::with('answers')->get();
        foreach ($users as $user) {
            $rowData = [
                $user->name,
                $user->email,
                $user->identity_num,
                $user->work,
                $user->study,
                $user->birth,
                $user->place,
                $user->created_at
            ];
    
            // Fetching answers for each user and adding them to the row
            foreach ($questions as $questionId => $question) {
                $answer = $user->answers()->where('question_id', $questionId)->value('answer');
                $rowData[] = $answer ?? ''; // If answer doesn't exist, use an empty string
            }
    
            $list[] = $rowData;
        }
    
        return $list;
    }
    
}