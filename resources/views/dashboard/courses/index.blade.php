@extends('dashboard.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <h1 class="h3 mb-4 text-gray-800">My Courses</h1>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/courses/create" class="btn btn-primary mb-3"><span class="fas fa-plus mr-1"></span>Create New
            Course</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <th scope="col">{{ $loop->iteration }}</th>
                        <td>{{ $course->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/courses/{{ $course->id }}" class="badge badge-info"><span
                                    class="far fa-eye"></span></a>
                            <a href="/dashboard/courses/{{ $course->id }}/edit" class="badge badge-warning"><span
                                    class="far fa-edit"></span></a>
                            <form action="/dashboard/courses/{{ $course->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge badge-danger border-0 show_confirm"><span
                                        class="far fa-trash-alt"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $courses->links() }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are You Sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
