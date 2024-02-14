@extends('welcome')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tasks table</h6>
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Task Title') }}</th>
                                        <th scope="col">{{ __('Project Title') }}</th>
                                        <th scope="col">{{ __('Assignee') }}</th>
                                        <th scope="col">{{ __('Description') }}</th>
                                        <th scope="col">{{ __('Deadline') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->project->title }}</td>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ Str::limit($task->description, 50) }}</td>
                                            <td>{{ $task->deadline }}</td>
                                            <td>
                                                @if ($task->status == 'Not Started')
                                                    <span class="badge bg-warning">{{ $task->status }}</span>
                                                @elseif($task->status == 'In Progress')
                                                    <span class="badge bg-info">{{ $task->status }}</span>
                                                @elseif($task->status == 'Completed')
                                                    <span class="badge bg-success">{{ $task->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-info btn-sm">{{ __('Edit') }}</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('{{ __('Are you sure you want to delete this task?') }}')">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3">
            <!-- ... your footer content ... -->
        </footer>
    </div>
@endsection
