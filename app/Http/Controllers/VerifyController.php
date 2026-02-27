<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VerifyController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'student_id'          => 'required|string',
            'registration_number' => 'required|string',
            'dob'                 => 'required|string',
        ]);

        // Find by student_id + registration_number first
        $student = User::where('role', 'student')
            ->where('student_id', $request->student_id)
            ->where('registration_number', $request->registration_number)
            ->first();

        // If found, compare date of birth flexibly (strip ordinal suffixes, any format)
        if ($student) {
            try {
                $cleanDate = fn($d) => Carbon::parse(
                    preg_replace('/(\d+)(st|nd|rd|th)\b/i', '$1', $d)
                )->startOfDay();

                if (!$cleanDate($request->dob)->equalTo($cleanDate($student->date_of_birth))) {
                    $student = null;
                }
            } catch (\Exception $e) {
                $student = null;
            }
        }

        if (!$student) {
            return redirect()->back()->withInput()->withErrors([
                'verify' => 'Invalid verification details. Please try again.',
            ]);
        }

        return view('verify', compact('student'));
    }
}

