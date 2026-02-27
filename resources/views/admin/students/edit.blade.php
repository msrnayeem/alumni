@extends('admin.layout')
@section('title', 'Edit Student')
@section('content')

<div style="margin-bottom:16px;">
    <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">&larr; Back to Students</a>
</div>

<div class="card">
    <div class="card-title">Edit Student: {{ $user->name }}</div>
    <form method="POST" action="{{ route('admin.students.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-grid">

            <div class="form-section-title">Account</div>
            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}">
                @error('username')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>New Password <small style="font-weight:normal;color:#6b7280;">(leave blank to keep)</small></label>
                <input type="password" name="password" placeholder="Leave blank to keep current">
                @error('password')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-section-title">Academic Info</div>
            <div class="form-group">
                <label>Student ID</label>
                <input type="text" name="student_id" value="{{ old('student_id', $user->student_id) }}">
            </div>
            <div class="form-group">
                <label>Registration Number</label>
                <input type="text" name="registration_number" value="{{ old('registration_number', $user->registration_number) }}">
            </div>
            <div class="form-group">
                <label>Program</label>
                <input type="text" name="program" value="{{ old('program', $user->program) }}">
            </div>
            <div class="form-group">
                <label>Degree</label>
                <input type="text" name="degree" value="{{ old('degree', $user->degree) }}">
            </div>
            <div class="form-group">
                <label>Major</label>
                <input type="text" name="major" value="{{ old('major', $user->major) }}">
            </div>
            <div class="form-group">
                <label>Major 2</label>
                <input type="text" name="major_1" value="{{ old('major_1', $user->major_1) }}">
            </div>
            <div class="form-group">
                <label>Enrolment Semester</label>
                <input type="text" name="enrolment_semester" value="{{ old('enrolment_semester', $user->enrolment_semester) }}">
            </div>
            <div class="form-group">
                <label>Passing Year</label>
                <input type="text" name="graduation_year" value="{{ old('graduation_year', $user->graduation_year) }}" placeholder="e.g. Spring 2023">
            </div>
            <div class="form-group">
                <label>Credit Completed</label>
                <input type="text" name="credit_completed" value="{{ old('credit_completed', $user->credit_completed) }}">
            </div>
            <div class="form-group">
                <label>CGPA</label>
                <input type="text" name="cgpa" value="{{ old('cgpa', $user->cgpa) }}">
            </div>
            <div class="form-group">
                <label>Result Publication Date</label>
                <input type="date" name="result_publication_date" value="{{ old('result_publication_date', $user->result_publication_date?->format('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <label>Current Status</label>
                <select name="current_status">
                    <option value="">-- Select --</option>
                    @foreach(['Graduated','Active','Inactive','Suspended'] as $opt)
                        <option value="{{ $opt }}" {{ old('current_status', $user->current_status) == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Certificate Serial</label>
                <input type="text" name="certificate_serial" value="{{ old('certificate_serial', $user->certificate_serial) }}">
            </div>

            <div class="form-section-title">Personal Info</div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth?->format('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div style="display:flex;gap:20px;margin-top:6px;">
                    @foreach(['Male','Female'] as $g)
                        <label style="font-weight:normal;display:flex;align-items:center;gap:6px;">
                            <input type="radio" name="gender" value="{{ $g }}" {{ old('gender', $user->gender) == $g ? 'checked' : '' }}> {{ $g }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label>Blood Group</label>
                <select name="blood_group">
                    <option value="">-- Select --</option>
                    @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                        <option value="{{ $bg }}" {{ old('blood_group', $user->blood_group) == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nationality</label>
                <select name="nationality">
                    <option value="">-- Select --</option>
                    @foreach(['Bangladeshi','Indian','Pakistani','Others'] as $nat)
                        <option value="{{ $nat }}" {{ old('nationality', $user->nationality) == $nat ? 'selected' : '' }}>{{ $nat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Marital Status</label>
                <select name="marital_status">
                    <option value="">-- Select --</option>
                    @foreach(['Single','Married','Divorced','Widowed'] as $ms)
                        <option value="{{ $ms }}" {{ old('marital_status', $user->marital_status) == $ms ? 'selected' : '' }}>{{ $ms }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Religion</label>
                <select name="religion">
                    <option value="">-- Select --</option>
                    @foreach(['Islam','Christianity','Hinduism','Buddhism','Others'] as $rel)
                        <option value="{{ $rel }}" {{ old('religion', $user->religion) == $rel ? 'selected' : '' }}>{{ $rel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>NID / Passport No.</label>
                <input type="text" name="nid_passport_no" value="{{ old('nid_passport_no', $user->nid_passport_no) }}">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}">
            </div>
            <div class="form-group">
                <label>Present Address</label>
                <input type="text" name="present_address" value="{{ old('present_address', $user->present_address) }}">
            </div>
            <div class="form-group">
                <label>Permanent Address</label>
                <input type="text" name="permanent_address" value="{{ old('permanent_address', $user->permanent_address) }}">
            </div>

            <div class="form-section-title">Family Info</div>
            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="father_name" value="{{ old('father_name', $user->father_name) }}">
            </div>
            <div class="form-group">
                <label>Father's Occupation</label>
                <input type="text" name="father_occupation" value="{{ old('father_occupation', $user->father_occupation) }}">
            </div>
            <div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mother_name" value="{{ old('mother_name', $user->mother_name) }}">
            </div>
            <div class="form-group">
                <label>Mother's Occupation</label>
                <input type="text" name="mother_occupation" value="{{ old('mother_occupation', $user->mother_occupation) }}">
            </div>
            <div class="form-group">
                <label>Emergency Contact</label>
                <input type="text" name="emergency_contact" value="{{ old('emergency_contact', $user->emergency_contact) }}">
            </div>
            <div class="form-group">
                <label>Guardian Contact</label>
                <input type="text" name="guardian_contact" value="{{ old('guardian_contact', $user->guardian_contact) }}">
            </div>

            <div class="form-section-title">Photos</div>
            <div class="form-group">
                <label>Profile Photo</label>
                @if($user->profile_photo_path)
                    <img src="{{ Storage::disk('public')->url($user->profile_photo_path) }}" style="width:60px;height:60px;object-fit:cover;border-radius:4px;margin-bottom:6px;" alt="profile">
                @endif
                <input type="file" name="profile_photo_path" accept="image/*">
                @error('profile_photo_path')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Signature Photo</label>
                @if($user->signature_photo_path)
                    <img src="{{ Storage::disk('public')->url($user->signature_photo_path) }}" style="width:100px;height:40px;object-fit:contain;border:1px solid #e2e8f0;margin-bottom:6px;" alt="signature">
                @endif
                <input type="file" name="signature_photo_path" accept="image/*">
                @error('signature_photo_path')<span class="error">{{ $message }}</span>@enderror
            </div>

        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
