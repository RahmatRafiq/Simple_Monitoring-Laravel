@extends('welcome')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Project</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('projects.update', ['project' => $project->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Project Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $project->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $project->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Not Started" {{ $project->status === 'Not Started' ? 'selected' : '' }}>
                                        Not Started</option>
                                    <option value="In Progress" {{ $project->status === 'In Progress' ? 'selected' : '' }}>
                                        In Progress</option>
                                    <option value="Completed" {{ $project->status === 'Completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ $project->start_date }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3">
            <!-- ... your footer content ... -->
        </footer>
    </div>
@endsection
