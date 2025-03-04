@extends("layout.index")

@section("content")
<div class="d-flex align-items-center">
<div class="container card shadow-sm" style="margin-top:100px;max-width: 500px">
    <div class="fs-3 fw-bold text-center">Add new task</div>
<form class="p-3" method="POST" action="{{ route('tasks.add.post') }}">
@csrf
    <div class="mb-3 mt-1">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="mb-3">
        <label> Deadline</label>
   <input type="datetime-local" class="form-control" name="deadline">
      </div>
      <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>

      <div class="mb-3">
      </div>
      @if (session()->has("success"))
      <div class="alert alert-success">
          {{ session()->get("success") }}
      </div>
      @endif

      @if (session()->has("error"))
      <div class="alert alert-error">
          {{ session()->get("error") }}
      </div>
      @endif
<button class="btn btn-success rounded-pill" type="submit">Submit</button>
<a href="/" class="btn btn-secondary">Back</a>
</form>
</div>
</div>
@endsection
