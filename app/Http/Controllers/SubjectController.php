<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectController extends Controller
{
	public function addSubject($message = null)
	{
		if (session()->has('admin_login')) {
			if (!empty($message)) {
				return view('admin.subjectEntry', compact('message'));
			}
			return view('admin.subjectEntry');
		} else {
			return redirect()->route('home');
		}
	}

	public function subjectStore(Request $request)
	{
		if (session()->has('admin_login')) {
			if ($request->has('subject_name')) {
				$snake_case_subject_name = str_replace(" ", "_", $request->input("subject_name"));
				$request->merge(['subject_name' => $snake_case_subject_name]);
			// Validation
				$validatedData = $request->validate([
					'subject_name' => 'required|unique:subject_class,subject_name',
				]);
				$class_count = 0;

			// Input data store
				$subject_name = strtolower($request->input('subject_name'));
				$one = $two = $three = $four = $five = $six = $seven = $eight = $nine = $ten = 0;

				if ($request->input('one') === 'on') {
					$one = 1;
					$class_count += 1;
				}
				if ($request->input('two') === 'on') {
					$two = 1;
					$class_count += 1;
				}
				if ($request->input('three') === 'on') {
					$three = 1;
					$class_count += 1;
				}
				if ($request->input('four') === 'on') {
					$four = 1;
					$class_count += 1;
				}
				if ($request->input('five') === 'on') {
					$five = 1;
					$class_count += 1;
				}
				if ($request->input('six') === 'on') {
					$six = 1;
					$class_count += 1;
				}
				if ($request->input('seven') === 'on') {
					$seven = 1;
					$class_count += 1;
				}
				if ($request->input('eight') === 'on') {
					$eight = 1;
					$class_count += 1;
				}
				if ($request->input('nine') === 'on') {
					$nine = 1;
					$class_count += 1;
				}
				if ($request->input('ten') === 'on') {
					$ten = 1;
					$class_count += 1;
				}

			// no class selected
				if ($class_count == 0) {
					return view('admin.subjectEntry')->with('noclass', 'The class selection required')->with('subject_name', $subject_name);
				} else {
			// insert values
					DB::table('subject_class')->insertGetID(
						[
							'subject_name' => $subject_name,
							'1' => $one,
							'2' => $two,
							'3' => $three,
							'4' => $four,
							'5' => $five,
							'6' => $six,
							'7' => $seven,
							'8' => $eight,
							'9' => $nine,
							'10' => $ten,

						]
					);

					Schema::create($subject_name, function (Blueprint $table) {
						$table->increments('id');
						$table->integer('sid');
						$table->integer('class');
						$table->integer('year');
						$table->integer('sem_slot');  // sem shortform of semseter
						$table->integer('sem_1')->nullable();
						$table->integer('sem_2')->nullable();
						$table->integer('sem_3')->nullable();
						$table->integer('avg_mark');
					});

					$subjectAddMess = ucwords(str_replace("_", " ", $subject_name)) . " : subject successfully added.";
					return redirect()->route('addSubject', [$subjectAddMess]);
				}
			}
			return redirect()->route('addSubject');
		} else {
			return redirect()->route('home');
		}
	}

	public function subjectShow()
	{
		if (session()->has('admin_login')) {
			$subject_list = DB::table('subject_class')->orderBy('subject_name')->get();
		// return $subject_list;
			return view('admin.subjectList', compact('subject_list'));
		} else {
			return redirect()->route('home');
		}
	}
}