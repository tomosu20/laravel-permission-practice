<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __invoke()
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Admin/Index', [
            'admins' => Admin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $roles = Role::where('guard_name', 'admin')->get();

        $adminHasRole = $admin->getRoleNames()[0]; //TODO:roleの任意対応
        $role = $roles->filter(function ($value) use ($adminHasRole) {
            return $value->name === $adminHasRole;
        })->values()[0];

        return Inertia::render('Admin/Admin/Show', [
            'admin' => $admin,
            'role' => $role->name,
            'permissions' => $role->getPermissionNames(),
            'selectRoles' => $roles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $admin->syncRoles($request->role);
        return to_route('admin.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
