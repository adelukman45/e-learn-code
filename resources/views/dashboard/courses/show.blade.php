@extends('dashboard.layouts.main')
@section('container')
    <h1 class="h3 mb-4 text-gray-800">Detail Course</h1>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 font-weight-bold col-form-label">Name</label>
        <div class="col">
            <p>{{ $course->name }}</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 font-weight-bold col-form-label">Link</label>
        <div class="col">
            <p>{{ $course->link }}</p>
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label font-weight-bold col-sm-2 pt-0">Category</legend>
            <div class="col">
                <p>{{ $course->category }}</p>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-10">
            @if ($course->category == 'HTML')
                <a href="/dashboard/courses/html" type="submit" class="btn btn-danger float-right">Back</a>
            @elseif ($course->category == 'CSS')
                <a href="/dashboard/courses/css" type="submit" class="btn btn-danger float-right">Back</a>
            @elseif ($course->category == 'PHP')
                <a href="/dashboard/courses/php" type="submit" class="btn btn-danger float-right">Back</a>
            @else
                <a href="/dashboard/courses/mobile" type="submit" class="btn btn-danger float-right">Back</a>
            @endif
        </div>
    </div>
@endsection
