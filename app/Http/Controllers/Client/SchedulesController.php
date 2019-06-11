<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Schedules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class SchedulesController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $schedules = $this->getSchedules();

        return view('schedules.show', [
            'schedules' => $schedules,
            'lessons' => $this->getLessons()
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $schedules = $this->getSchedules();

        return view('schedules.edit', [
            'schedules' => $schedules,
            'lessons' => $this->getLessons()
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }

        $days = ['Mo','Tu','We','Th','Fr','Sa','Su'];
        foreach ($days as $day) {
            $subjects = $request[$day] ?? [];
            foreach ($subjects as $lesson_number => $subject) {
                $schedule = Schedules::where(['day_week' => $day, 'lesson_number' => $lesson_number])->first();
                if ($schedule) {
                    $schedule->subject = $subject ?? '';
                    $schedule->save();
                } else {
                    Schedules::create([
                        'day_week' => $day,
                        'lesson_number' => $lesson_number,
                        'subject' => $subject ?? '',
                        'subject_id' => 0,
                        'user_id' => $user->id,
                    ]);
                }
            }
        }

        return redirect('/schedules');
    }

    /**
     * @return array
     */
    private function getSchedules()
    {
        $all_schedules = Schedules::all();
        $schedules = [];
        foreach ($all_schedules as $schedule) {
            $day_week = $schedule['day_week'];
            $lesson_number = $schedule['lesson_number'];
            if (empty($schedules[$day_week])) {
                $schedules[$day_week] = [];
            }
            $schedules[$day_week][$lesson_number] = $schedule->subject;
        }

        return $schedules;
    }

    /**
     * @return array
     */
    private function getLessons()
    {
        $lessons = [
            '08:30-10:00',
            '10:10-11:40',
            '11:50-13:20',
            '13:30-15:00',
            '15:10-16:40',
            '16:50-18:20',
            '18:30-20:00',
        ];

        return $lessons;
    }
}
