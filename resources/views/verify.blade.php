@extends('layouts.master')

@section('content')

{{-- Marquee notice --}}
<div class="marquee-container">
  <div class="marquee">
    This is the only official website authorized by South Asia University Bangladesh for online certificate verification.
  </div>
</div>

@if($student)

<style>
  .profile-container { max-width: 720px; margin: 30px auto; font-family: Arial, sans-serif; border: 1px solid #ddd; border-radius: 6px; overflow: hidden; }
  .profile-container img.photo { width: 140px; height: 140px; object-fit: cover; border-radius: 4px; border: 1px solid #ccc; }
  .profile-header { display:flex; gap:16px; align-items:center; padding:16px; background:#f8f9fa; border-bottom:1px solid #eee; }
  .profile-header h2 { margin:0; font-size:22px; }
  .profile-details { padding:16px; }
  .profile-details table { width:100%; border-collapse:collapse; }
  .profile-details td { padding:8px 6px; border-bottom:1px solid #f0f0f0; }
  .profile-details .label { width:260px; font-weight:bold; color:#333; }
  .footer { padding:12px 16px; text-align:center; font-size:13px; color:#666; background:#fafafa; }
  .signature-wrap { padding:10px 16px 0 16px; }
  .signature-wrap img { max-width: 220px; display:block; }
  .signature-caption { font-size:12px; color:#555; margin-top:4px; }
</style>

<div class="profile-container">
  <div class="profile-header">
    @if($student->profile_photo_path)
      <img class="photo" src="{{ Storage::url($student->profile_photo_path) }}" alt="Student Photo">
    @else
      <img class="photo" src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&size=140&background=E64A19&color=fff&bold=true&format=svg" alt="Student Photo">
    @endif
    <div>
      <h2>{{ strtoupper($student->name) }}</h2>
      @if($student->enrolment_semester || $student->graduation_year)
        <div><strong>SESSION:</strong>
          {{ $student->enrolment_semester ?? '' }}
          @if($student->graduation_year) - {{ $student->graduation_year }} @endif
        </div>
      @endif
    </div>
  </div>

  @if($student->signature_photo_path)
    <div class="signature-wrap">
      <img src="{{ Storage::url($student->signature_photo_path) }}" alt="Signature">
      <div class="signature-caption">SIGNATURE</div>
    </div>
  @endif

  <div class="profile-details">
    <table>
      @if($student->student_id)
        <tr><td class="label">STUDENT ID:</td><td>{{ strtoupper($student->student_id) }}</td></tr>
      @endif
      @if($student->registration_number)
        <tr><td class="label">REGISTRATION NUMBER:</td><td>{{ strtoupper($student->registration_number) }}</td></tr>
      @endif
      @if($student->program)
        <tr><td class="label">PROGRAM:</td><td>{{ strtoupper($student->program) }}</td></tr>
      @endif
      @if($student->major_1)
        <tr><td class="label">MAJOR SUBJECT 1:</td><td>{{ strtoupper($student->major_1) }}</td></tr>
      @endif
      @if($student->cgpa)
        <tr><td class="label">CGPA:</td><td>{{ $student->cgpa }}</td></tr>
      @endif
      @if($student->enrolment_semester)
        <tr><td class="label">ENROLMENT SEMESTER:</td><td>{{ strtoupper($student->enrolment_semester) }}</td></tr>
      @endif
      @if($student->graduation_year)
        <tr><td class="label">PASSING YEAR:</td><td>{{ strtoupper($student->graduation_year) }}</td></tr>
      @endif
      @if($student->result_publication_date)
        <tr><td class="label">RESULT PUBLICATION'S DATE:</td><td>{{ strtoupper($student->result_publication_date) }}</td></tr>
      @endif
      @if($student->credit_completed)
        <tr><td class="label">COMPLETED CREDIT:</td><td>{{ $student->credit_completed }}</td></tr>
      @endif
      @if($student->certificate_serial)
        <tr><td class="label">CERTIFICATE SERIAL:</td><td>{{ strtoupper($student->certificate_serial) }}</td></tr>
      @endif
      @if($student->current_status)
        <tr><td class="label">CURRENT STATUS:</td><td>{{ strtoupper($student->current_status) }}</td></tr>
      @endif
      @if($student->father_name)
        <tr><td class="label">FATHER'S NAME:</td><td>{{ strtoupper($student->father_name) }}</td></tr>
      @endif
      @if($student->mother_name)
        <tr><td class="label">MOTHER'S NAME:</td><td>{{ strtoupper($student->mother_name) }}</td></tr>
      @endif
      @if($student->gender)
        <tr><td class="label">GENDER:</td><td>{{ strtoupper($student->gender) }}</td></tr>
      @endif
      @if($student->permanent_address)
        <tr><td class="label">ADDRESS:</td><td>{{ strtoupper($student->permanent_address) }}</td></tr>
      @endif
      @if($student->date_of_birth)
        <tr><td class="label">DATE OF BIRTH:</td><td>@formatDob($student->date_of_birth)</td></tr>
      @endif
    </table>
  </div>

  <div class="footer">
    &copy; {{ date('Y') }} UNIVERSITY OF SOUTH ASIA. ALL RIGHTS RESERVED.
  </div>
</div>

@endif

@endsection
