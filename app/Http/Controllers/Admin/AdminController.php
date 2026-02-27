<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalStudents = User::where('role', 'student')->count();
        return view('admin.dashboard', compact('totalStudents'));
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $students = User::where('role', 'student')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%")
                       ->orWhere('email', 'like', "%{$search}%")
                       ->orWhere('student_id', 'like', "%{$search}%")
                       ->orWhere('username', 'like', "%{$search}%")
                       ->orWhere('registration_number', 'like', "%{$search}%")
                       ->orWhere('program', 'like', "%{$search}%");
                });
            })
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view('admin.students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users,email',
            'username'              => 'nullable|string|max:255|unique:users,username',
            'password'              => 'required|string|min:6',
            'student_id'            => 'nullable|string|max:255',
            'registration_number'   => 'nullable|string|max:255',
            'program'               => 'nullable|string|max:255',
            'graduation_year'       => 'nullable|string|max:255',
            'degree'                => 'nullable|string|max:255',
            'major'                 => 'nullable|string|max:255',
            'major_1'               => 'nullable|string|max:255',
            'enrolment_semester'    => 'nullable|string|max:255',
            'credit_completed'      => 'nullable|string|max:255',
            'cgpa'                  => 'nullable|string|max:255',
            'result_publication_date' => 'nullable|string|max:255',
            'current_status'        => 'nullable|string|max:255',
            'certificate_serial'    => 'nullable|string|max:255',
            'date_of_birth'         => 'nullable|string|max:255',
            'gender'                => 'nullable|string|max:255',
            'blood_group'           => 'nullable|string|max:255',
            'nationality'           => 'nullable|string|max:255',
            'marital_status'        => 'nullable|string|max:255',
            'religion'              => 'nullable|string|max:255',
            'nid_passport_no'       => 'nullable|string|max:255',
            'mobile'                => 'nullable|string|max:255',
            'present_address'       => 'nullable|string|max:255',
            'permanent_address'     => 'nullable|string|max:255',
            'father_name'           => 'nullable|string|max:255',
            'father_occupation'     => 'nullable|string|max:255',
            'mother_name'           => 'nullable|string|max:255',
            'mother_occupation'     => 'nullable|string|max:255',
            'emergency_contact'     => 'nullable|string|max:255',
            'guardian_contact'      => 'nullable|string|max:255',
            'profile_photo_path'    => 'nullable|image|max:2048',
            'signature_photo_path'  => 'nullable|image|max:2048',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'student';

        if ($request->hasFile('profile_photo_path')) {
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('profiles', 'public');
        }
        if ($request->hasFile('signature_photo_path')) {
            $data['signature_photo_path'] = $request->file('signature_photo_path')->store('signatures', 'public');
        }

        User::create($data);

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.students.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users,email,' . $user->id,
            'username'              => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'password'              => 'nullable|string|min:6',
            'student_id'            => 'nullable|string|max:255',
            'registration_number'   => 'nullable|string|max:255',
            'program'               => 'nullable|string|max:255',
            'graduation_year'       => 'nullable|string|max:255',
            'degree'                => 'nullable|string|max:255',
            'major'                 => 'nullable|string|max:255',
            'major_1'               => 'nullable|string|max:255',
            'enrolment_semester'    => 'nullable|string|max:255',
            'credit_completed'      => 'nullable|string|max:255',
            'cgpa'                  => 'nullable|string|max:255',
            'result_publication_date' => 'nullable|string|max:255',
            'current_status'        => 'nullable|string|max:255',
            'certificate_serial'    => 'nullable|string|max:255',
            'date_of_birth'         => 'nullable|string|max:255',
            'gender'                => 'nullable|string|max:255',
            'blood_group'           => 'nullable|string|max:255',
            'nationality'           => 'nullable|string|max:255',
            'marital_status'        => 'nullable|string|max:255',
            'religion'              => 'nullable|string|max:255',
            'nid_passport_no'       => 'nullable|string|max:255',
            'mobile'                => 'nullable|string|max:255',
            'present_address'       => 'nullable|string|max:255',
            'permanent_address'     => 'nullable|string|max:255',
            'father_name'           => 'nullable|string|max:255',
            'father_occupation'     => 'nullable|string|max:255',
            'mother_name'           => 'nullable|string|max:255',
            'mother_occupation'     => 'nullable|string|max:255',
            'emergency_contact'     => 'nullable|string|max:255',
            'guardian_contact'      => 'nullable|string|max:255',
            'profile_photo_path'    => 'nullable|image|max:2048',
            'signature_photo_path'  => 'nullable|image|max:2048',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('profile_photo_path')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('profiles', 'public');
        } else {
            unset($data['profile_photo_path']);
        }

        if ($request->hasFile('signature_photo_path')) {
            if ($user->signature_photo_path) {
                Storage::disk('public')->delete($user->signature_photo_path);
            }
            $data['signature_photo_path'] = $request->file('signature_photo_path')->store('signatures', 'public');
        } else {
            unset($data['signature_photo_path']);
        }

        $user->update($data);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }
        if ($user->signature_photo_path) {
            Storage::disk('public')->delete($user->signature_photo_path);
        }
        $user->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully.');
    }
}
