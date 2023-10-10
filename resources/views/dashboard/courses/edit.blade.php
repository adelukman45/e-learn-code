@extends('dashboard.layouts.main')
@section('container')
    <h1 class="h3 mb-4 text-gray-800">Create New Course</h1>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/courses/{{ $course->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required
                    autofocus value="{{ old('name', $course->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://www.youtube.com/embed/</span>
                    </div>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link"
                        required value="{{ old('link', substr($course->link, 30)) }}">
                    <small id="emailHelp" class="form-text text-muted">Example
                        'https://www.youtube.com/watch?v=<b>NBZ9Ro6UKV8</b>'
                        please input NBZ9Ro6UKV8 .</small>
                    @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category">
                    @if (old('category', $course->category) == 'HTML')
                        <option value="{{ $course->category }}" selected>{{ $course->category }}</option>
                        <option>CSS</option>
                        <option>PHP</option>
                        <option>Mobile</option>
                    @elseif (old('category', $course->category) == 'CSS')
                        <option value="{{ $course->category }}" selected>{{ $course->category }}</option>
                        <option>HTML</option>
                        <option>PHP</option>
                        <option>Mobile</option>
                    @elseif (old('category', $course->category) == 'PHP')
                        <option value="{{ $course->category }}" selected>{{ $course->category }}</option>
                        <option>HTML</option>
                        <option>CSS</option>
                        <option>Mobile</option>
                    @else
                        <option value="{{ $course->category }}" selected>{{ $course->category }}</option>
                        <option>HTML</option>
                        <option>CSS</option>
                        <option>PHP</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-right ml-1">Save</button>
            @if ($course->category == 'HTML')
                <a href="/dashboard/courses/html" type="submit" class="btn btn-danger float-right">Back</a>
            @elseif ($course->category == 'css')
                <a href="/dashboard/courses/css" type="submit" class="btn btn-danger float-right">Back</a>
            @elseif ($course->category == 'PHP')
                <a href="/dashboard/courses/php" type="submit" class="btn btn-danger float-right">Back</a>
            @else
                <a href="/dashboard/courses/mobile" type="submit" class="btn btn-danger float-right">Back</a>
            @endif
        </form>
    </div>
@endsection
