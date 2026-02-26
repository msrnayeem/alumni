@extends('layouts.master')

@section('content')

<style>
  .profile-container { max-width: 1000px; margin: 30px auto; font-family: Arial, sans-serif; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
  .profile-header { display:flex; flex-wrap:wrap; gap:20px; align-items:center; padding:20px; background:#f8f9fa; border-bottom:1px solid #ddd; }
  .profile-header img { width:140px; height:140px; object-fit:cover; border-radius:8px; border:2px solid #a3003b; }
  .profile-header h2 { margin:0; font-size:26px; color:#6b0e3d; }
  .profile-section { padding:20px; }
  .section-title { font-size:20px; color:#a3003b; margin-bottom:15px; border-bottom:2px solid #eee; padding-bottom:5px; }
  .info-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:15px; }
  .info-item { background:#fafafa; padding:12px; border-left:5px solid #a3003b; border-radius:6px; }
  .info-item strong { display:block; color:#333; margin-bottom:4px; }
  @media(max-width:600px){ .profile-header { text-align:center; justify-content:center; } .profile-header img { margin:auto; } }
</style>

 
<div class="profile-container">
  <div class="profile-header">
    <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('profile.jpeg') }}" alt="Student Photo">
    <div>
      <h2>{{ strtoupper(auth()->user()->name) }}</h2>
      <div>
        {{ strtoupper(auth()->user()->program) }} | ID: {{ auth()->user()->student_id }}      </div>
    </div>
  </div>

      <div class="profile-section">
      <div class="section-title">ACADEMIC INFORMATION</div>
      <div class="info-grid">
                  <div class="info-item">
            <strong>REGISTRATION NUMBER:</strong>
            {{ strtoupper(auth()->user()->registration_number ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>PROGRAM:</strong>
            {{ strtoupper(auth()->user()->program ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>MAJOR 1:</strong>
            {{ strtoupper(auth()->user()->major_1 ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>ENROLMENT SEMESTER:</strong>
            {{ strtoupper(auth()->user()->enrolment_semester ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>PASSING YEAR:</strong>
            {{ strtoupper(auth()->user()->graduation_year ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>CREDIT COMPLETED:</strong>
            {{ strtoupper(auth()->user()->credit_completed ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>CGPA:</strong>
            {{ strtoupper(auth()->user()->cgpa ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>RESULT PUBLICATION'S DATE:</strong>
            {{ strtoupper(auth()->user()->result_publication_date ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>CURRENT STATUS:</strong>
            {{ strtoupper(auth()->user()->current_status ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>CERTIFICATE SERIAL:</strong>
            {{ strtoupper(auth()->user()->certificate_serial ?? 'N/A') }}          </div>
              </div>
    </div>
  
      <div class="profile-section">
      <div class="section-title">PERSONAL INFORMATION</div>
      <div class="info-grid">
                  <div class="info-item">
            <strong>DATE OF BIRTH:</strong>
            {{ strtoupper(auth()->user()->date_of_birth ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>GENDER:</strong>
            {{ strtoupper(auth()->user()->gender ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>BLOOD GROUP:</strong>
            {{ strtoupper(auth()->user()->blood_group ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>NATIONALITY:</strong>
            {{ strtoupper(auth()->user()->nationality ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>MARITAL STATUS:</strong>
            {{ strtoupper(auth()->user()->marital_status ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>RELIGION:</strong>
            {{ strtoupper(auth()->user()->religion ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>NID / PASSPORT NO:</strong>
            {{ strtoupper(auth()->user()->nid_passport_no ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>EMAIL:</strong>
            {{ strtoupper(auth()->user()->email ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>MOBILE:</strong>
            {{ strtoupper(auth()->user()->mobile ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>PRESENT ADDRESS:</strong>
            {{ strtoupper(auth()->user()->present_address ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>PERMANENT ADDRESS:</strong>
            {{ strtoupper(auth()->user()->permanent_address ?? 'N/A') }}          </div>
              </div>
    </div>
  
      <div class="profile-section">
      <div class="section-title">GUARDIAN INFORMATION</div>
      <div class="info-grid">
                  <div class="info-item">
            <strong>FATHER'S NAME:</strong>
            {{ strtoupper(auth()->user()->father_name ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>FATHER'S OCCUPATION:</strong>
            {{ strtoupper(auth()->user()->father_occupation ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>MOTHER'S NAME:</strong>
            {{ strtoupper(auth()->user()->mother_name ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>MOTHER'S OCCUPATION:</strong>
            {{ strtoupper(auth()->user()->mother_occupation ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>EMERGENCY CONTACT:</strong>
            {{ strtoupper(auth()->user()->emergency_contact ?? 'N/A') }}          </div>
                  <div class="info-item">
            <strong>GUARDIAN CONTACT:</strong>
            {{ strtoupper(auth()->user()->guardian_contact ?? 'N/A') }}          </div>
              </div>
    </div>

      <div class="profile-section">
      <div class="section-title">SIGNATURE</div>
      <img src="{{ auth()->user()->signature_photo_path ? asset('storage/' . auth()->user()->signature_photo_path) : asset('signature.jpeg') }}" alt="Signature" style="max-width:220px; display:block;">
    </div>
  </div>

@endsection
