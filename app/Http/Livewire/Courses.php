<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Courses extends Component
{
    public $courses, $name, $link, $category, $course_id;
    public $updateMode = false;

    public function render()
    {
        $this->courses = Course::all();
        return view('livewire.courses');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->link = '';
        $this->category = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'link' => 'required',
            'category' => 'required',
        ]);

        Course::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('modal'); // Close model to using to jquery

    }
}
