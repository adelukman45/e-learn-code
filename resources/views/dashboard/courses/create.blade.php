@extends('dashboard.layouts.main')
@section('container')
    <h1 class="h3 mb-4 text-gray-800">Create New Course</h1>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/courses" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required
                    autofocus value="{{ old('name') }}">
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
                        required value="{{ old('link') }}" placeholder="">
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
                    <option>HTML</option>
                    <option>CSS</option>
                    <option>PHP</option>
                    <option>Mobile</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
    </div>
@endsection
