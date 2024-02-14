@extends('welcome')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="project_id" class="form-label">{{ __('Project') }}</label>
                                <select id="project_id" class="form-control" name="project_id" required>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Task Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">{{ __('Assignee') }}</label>
                                <select id="user_id" class="form-control" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="deadline" class="form-label">{{ __('Deadline') }}</label>
                                <input id="deadline" type="date" class="form-control" name="deadline">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('Status') }}</label>
                                <select id="status" class="form-control" name="status" required>
                                    <option value="Not Started">{{ __('Not Started') }}</option>
                                    <option value="In Progress">{{ __('In Progress') }}</option>
                                    <option value="Completed">{{ __('Completed') }}</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Create Task') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
