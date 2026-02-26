@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Students</div>
        <div class="stat-value">{{ $totalStudents }}</div>
    </div>
</div>

<div class="card">
    <div class="card-title">Quick Actions</div>
    <a href="{{ route('admin.students.index') }}" class="btn btn-primary">View All Students</a>
    &nbsp;
    <a href="{{ route('admin.students.create') }}" class="btn btn-secondary">Add New Student</a>
</div>

@endsection
