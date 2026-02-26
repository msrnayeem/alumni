@extends('admin.layout')
@section('title', 'Students')
@section('content')

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
    <h2 style="font-size:16px; font-weight:700; color:#1e293b;">All Students ({{ $students->total() }})</h2>
    <a href="{{ route('admin.students.create') }}" class="btn btn-primary">+ Add Student</a>
</div>

<div class="card">
    <form method="GET" class="search-row">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search name, email, ID, program...">
        <button type="submit" class="btn btn-primary">Search</button>
        @if($search)
            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Clear</a>
        @endif
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Student ID</th>
                    <th>Reg. No.</th>
                    <th>Program</th>
                    <th>CGPA</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>
                        @if($student->profile_photo_path)
                            <img src="{{ Storage::disk('public')->url($student->profile_photo_path) }}" class="img-thumb" alt="photo">
                        @else
                            <div style="width:36px;height:36px;background:#e2e8f0;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;color:#94a3b8;">?</div>
                        @endif
                    </td>
                    <td><strong>{{ $student->name }}</strong></td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->student_id ?? '—' }}</td>
                    <td>{{ $student->registration_number ?? '—' }}</td>
                    <td>{{ $student->program ?? '—' }}</td>
                    <td>{{ $student->cgpa ?? '—' }}</td>
                    <td style="white-space:nowrap;">
                        <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form method="POST" action="{{ route('admin.students.destroy', $student) }}" style="display:inline;"
                              onsubmit="return confirm('Delete {{ addslashes($student->name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align:center; color:#94a3b8; padding:30px;">No students found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($students->hasPages())
    <div class="pagination">
        {{-- Previous --}}
        @if($students->onFirstPage())
            <span>&laquo;</span>
        @else
            <a href="{{ $students->previousPageUrl() }}">&laquo;</a>
        @endif

        @foreach($students->getUrlRange(max(1, $students->currentPage()-2), min($students->lastPage(), $students->currentPage()+2)) as $page => $url)
            @if($page == $students->currentPage())
                <span class="active">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next --}}
        @if($students->hasMorePages())
            <a href="{{ $students->nextPageUrl() }}">&raquo;</a>
        @else
            <span>&raquo;</span>
        @endif
    </div>
    @endif
</div>

@endsection
