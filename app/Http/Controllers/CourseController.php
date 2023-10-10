<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::where('category', 'HTML')->get()
        ]);
    }

    public function user()
    {
        return view('user', [
            'counthtml' => Course::where('category', 'HTML')->get()->count(),
            'countcss' => Course::where('category', 'CSS')->get()->count(),
            'countphp' => Course::where('category', 'PHP')->get()->count(),
            'countmobile' => Course::where('category', 'Mobile')->get()->count(),
        ]);
    }

    public function html()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::where('category', 'HTML')->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }

    public function coursehtml()
    {
        return view('courses.index', [
            'courses' => Course::where('category', 'HTML')->get(),
            'category' => Course::where('category', 'HTML')->first()
        ]);
    }

    public function css()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::where('category', 'CSS')->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }

    public function coursecss()
    {
        return view('courses.index', [
            'courses' => Course::where('category', 'CSS')->get(),
            'category' => Course::where('category', 'CSS')->first()
        ]);
    }

    public function php()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::where('category', 'PHP')->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }

    public function coursephp()
    {
        return view('courses.index', [
            'courses' => Course::where('category', 'PHP')->get(),
            'category' => Course::where('category', 'PHP')->first()
        ]);
    }

    public function mobile()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::where('category', 'Mobile')->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }

    public function coursemobile()
    {
        return view('courses.index', [
            'courses' => Course::where('category', 'Mobile')->get(),
            'category' => Course::where('category', 'Mobile')->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'category' => 'required',
        ]);

        $validatedData['link'] = 'https://www.youtube.com/embed/' . $request->link;

        Course::create($validatedData);
        Alert::success('Congrats', 'New course has been added!');
        if ($request->category == 'HTML') {
            return redirect('dashboard/courses/html');
        } elseif ($request->category == 'CSS') {
            return redirect('dashboard/courses/css');
        } elseif ($request->category == 'PHP') {
            return redirect('dashboard/courses/php');
        } else {
            return redirect('dashboard/courses/mobile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('dashboard.courses.show', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course)
    {
        return view('dashboard.courses.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'category' => 'required',
        ]);

        $validatedData['link'] = 'https://www.youtube.com/embed/' . $request->link;

        Course::where('id', $course->id)
            ->update($validatedData);
        Alert::success('Congrats', 'Course has been edited!');

        if ($request->category == 'HTML') {
            return redirect('dashboard/courses/html');
        } elseif ($request->category == 'CSS') {
            return redirect('dashboard/courses/css');
        } elseif ($request->category == 'PHP') {
            return redirect('dashboard/courses/php');
        } else {
            return redirect('dashboard/courses/mobile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        Alert::success('Congrats', 'Course has been deleted!');
        if ($course->category == 'HTML') {
            return redirect('dashboard/courses/html');
        } elseif ($course->category == 'CSS') {
            return redirect('dashboard/courses/css');
        } elseif ($course->category == 'PHP') {
            return redirect('dashboard/courses/php');
        } else {
            return redirect('dashboard/courses/mobile');
        }
    }
}
