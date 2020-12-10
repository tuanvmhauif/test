<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSurvey;

class SurveyController extends Controller
{
  public function index(){
	  $test = '';
    return view('survey')->with(['test' => $test] );
  }
  public function survey(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required',
      'telephone' => 'required',
      'feedback' => 'required'
    ]);

    $survey = new StudentSurvey();
    $survey->name = $request->name;
    $survey->email = $request->email;
    $survey->telephone = $request->telephone;
    $survey->feedback = $request->feedback;
	$test = "abc";
    return view('survey')->with(['test' => $test] );
  }
}
