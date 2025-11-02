<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index()
    {
        $user = Auth::user();
        $profileData = null;

        switch ($user->role_id) {
            case 'student':
                $profileData = StudentModel::where('user_id', $user->id)->first();
                break;
            case 'teacher':
            case 'admin': // tambahkan admin ke sini
                $profileData = TeacherModel::where('user_id', $user->id)->first();
                break;
            case 'companies':   
                $profileData = CompanyModel::where('user_id', $user->id)->first();
                break;
        }

        return view('profile.index', compact('user', 'profileData'));
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        $user = Auth::user();
        $profileData = null;

        switch ($user->role_id) {
            case 'student':
                $profileData = StudentModel::where('user_id', $user->id)->first();
                break;
            case 'teacher':
            case 'admin': // tambahkan admin ke sini
                $profileData = TeacherModel::where('user_id', $user->id)->first();
                break;
            case 'companies':
                $profileData = CompanyModel::where('user_id', $user->id)->first();
                break;
        }

        return view('profile.edit', compact('user', 'profileData'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Validate common user data
        $userValidationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ];

        // Add password validation only if password is provided
        if ($request->filled('password')) {
            $userValidationRules['password'] = 'required|min:8|confirmed';
            $userValidationRules['password_confirmation'] = 'required';
        }

        $userData = $request->validate($userValidationRules);

        // Update user data
        $user->update([
            'name' => $userData['name'],
            'email' => $userData['email'],
        ] + ($request->filled('password') ? [
            'password' => Hash::make($userData['password'])
        ] : []));

        // Update role-specific profile data
        switch ($user->role_id) {
            case 'student':
                $this->updateStudentProfile($user, $request);
                break;
            case 'teacher':
            case 'admin': // tambahkan admin ke sini
                $this->updateTeacherProfile($user, $request);
                break;
            case 'companies':
                $this->updateCompanyProfile($user, $request);
                break;
        }

        return redirect()->route('profile.index')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Update student profile data
     */
    private function updateStudentProfile(User $user, Request $request)
    {
        $studentData = $request->validate([
            'nis' => 'required|string|max:20',
            'class' => 'required|string|max:10',
            'major' => 'required|string|max:50',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        StudentModel::updateOrCreate(
            ['user_id' => $user->id],
            $studentData
        );
    }

    /**
     * Update teacher profile data
     */
    private function updateTeacherProfile(User $user, Request $request)
    {
        $teacherData = $request->validate([
            'nip' => 'required|string|max:20',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'email' => 'required|email|max:255',
        ]);

        TeacherModel::updateOrCreate(
            ['user_id' => $user->id],
            $teacherData
        );
    }

    /**
     * Update company profile data
     */
    private function updateCompanyProfile(User $user, Request $request)
    {
        $companyData = $request->validate([
            'name' => 'required|string|max:255',
            'business_field' => 'required|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'npwp' => 'nullable|string|max:20',
            'established_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'total_employees' => 'nullable|integer|min:0',
            'supervisor_name' => 'nullable|string|max:255',
            'supervisor_position' => 'nullable|string|max:100',
            'supervisor_phone' => 'nullable|string|max:15',
            'supervisor_email' => 'nullable|email|max:255',
        ]);

        CompanyModel::updateOrCreate(
            ['user_id' => $user->id],
            $companyData
        );
    }
}