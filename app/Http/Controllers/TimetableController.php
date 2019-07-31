<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Timetable;
use App\Models\School;
use App\Models\Day;
use App\Models\AcademicYear;
use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;

class TimetableController extends Controller
{
    public function index()
    {
        //
    }

    public function create($class_id)
    {
        $class = Classe::findOrFail($class_id);
        return view('timetables.create', compact('class'));
    }

    public function store(Request $request, $class_id)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'academic_year' => 'required|integer',
           'session' => 'required|integer'
       ]);

       $class = Classe::findOrFail($class_id);
       $timetable = Timetable::create([
           'name' => $request->name,
           'class_id' => $class->id,
           'school_id' => $class->school->id,
           'academic_year_id' => $request->academic_year,
           'session_id' => $request->session
       ]);

       flash('Emploi du temps enregistré avec succès !')->success();
       return redirect()->route('timetables.show', $timetable->id);
    }

    public function show(Timetable $timetable)
    {
        return view('timetables.show', compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        //
    }
    
    public function createDay($timetable_id)
    {
        $timetable = Timetable::findOrFail($timetable_id);
        $days = Day::all();
        return view('day_timetable.create', compact('timetable', 'days'));
    }

    public function storeDay(Request $request, $timetable_id)
    {
        $this->validate($request, [
           'day' => 'required|integer'
       ]);
       $timetable = Timetable::findOrFail($timetable_id);

       $timetable->days()->attach($request->day);

       flash('Jour assigné avec succès !')->success();
       return redirect()->route('timetables.show', $timetable->id);
    }

    public function destroyDay(Request $request, $timetable_id, $day_id)
    {
        $day = Day::findOrFail($day_id);
        $day->subjects()->detach();

        $timetable = Timetable::findOrFail($timetable_id);
        $timetable->days()->detach($day_id);

        flash('Assignation retirée !');
        return redirect()->route('timetables.show', $timetable_id);
    }

    public function createDaySubject($timetable_id, $day_id)
    {
        $timetable = Timetable::findOrFail($timetable_id);
        $day = Day::findOrFail($day_id);
        if(Auth::user()->school_id == null) {
            $subjects = Subject::all();
        } else {
            $subjects = collect(Subject::where('school_id', Auth::user()->school_id)->get());
        }
        return view('day_subject.create', compact('timetable', 'day', 'subjects'));
    }

    public function storeDaySubject(Request $request, $timetable_id, $day_id)
    {
        $this->validate($request, [
            'subject' => 'required|integer',
            'professor' => 'required|integer',
            'start' => 'required|date_format:H:i|before:end',
            'end' => 'required|date_format:H:i|after:start'
       ]);

       $day = Day::findOrFail($day_id);

       $day->subjects()->attach($request->subject, ['professor_id' => $request->professor, 'start' => $request->start, 'end' => $request->end]);

       flash('Matière assignée avec succès !')->success();
       return redirect()->route('timetables.show', $timetable_id);
    }

    public function destroyDaySubject(Request $request, $timetable_id, $day_id, $subject_id)
    {
       $day = Day::findOrFail($day_id);

       $day->subjects()->detach($subject_id);

       flash('Assignation retirée !');
       return redirect()->route('timetables.show', $timetable_id);
    }
}
