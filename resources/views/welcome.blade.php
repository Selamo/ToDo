@extends("layout.index")

@section("content")
<main class="flex-shrink-0 mt-5">
    <div class="container" style="max-width: 600px">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">List of Tasks</h6>

            <!-- Display success or error messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @foreach($tasks as $task)
                <div class="task-item mb-3">
                    <div class="d-flex text-body-secondary">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff"></rect>
                            <text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                        </svg>
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-gray-dark">{{ $task->title }} | {{ $task->deadline }}</strong>
                                <div class="btn-group"> <!-- Wrap all buttons in a btn-group for better alignment -->
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="me-2"> <!-- Added margin-end for spacing -->
                                        @csrf
                                        <div class="input-group">
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Update</a>
                                        </div>
                                    </form>
                                    <a href="{{ route('tasks.status.update', $task->id) }}" class="btn btn-success">Completed</a>
                                    <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                            <span class="d-block">{{ $task->title }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-3">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
