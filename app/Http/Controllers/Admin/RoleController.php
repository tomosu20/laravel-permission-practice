<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Role/Index', ['roles' => Role::all()]);
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
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $roleWithPermissions = [
            'role' => $role,
            'permissions' => [
                'company' => $role->hasPermissionTo('company'),
                'user' => $role->hasPermissionTo('user'),
                'money' => $role->hasPermissionTo('money'),
                'mailDelivery' => $role->hasPermissionTo('mail_delivery'),
                'notification' => $role->hasPermissionTo('notification'),
                'facility' => $role->hasPermissionTo('facility'),
                'domain' => $role->hasPermissionTo('domain'),
                'system' => $role->hasPermissionTo('system'),
            ],
        ];
        return Inertia::render('Admin/Role/Show', $roleWithPermissions);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $selectedPermissionNames = [];
        $selectedPermissions = array_filter($request->permissions);
        foreach ($selectedPermissions as $name => $hasPermission) {
            if ($hasPermission) {
                switch ($name) {
                    case 'mailDelivery':
                        array_push($selectedPermissionNames, 'mail_delivery');
                        break;
                    default:
                        array_push($selectedPermissionNames, $name);
                        break;
                }
            }
        }

        $attachPermissions = count($selectedPermissionNames) > 0 ?
            Permission::where('guard_name', 'admin')->whereIn('name', $selectedPermissionNames)->get() : [];

        DB::beginTransaction();
        $role->update(['name' => $request->name]);
        //permissionsが0個の場合、delete文1回
        //permissionsが複数個の場合、delete文1回、insert文1回（一度全部の権限を削除した後に、permissionsをinsertしている。）
        $role->syncPermissions($attachPermissions);
        DB::commit();

        return to_route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }

    public function getOwnPermissionNames(Role $role)
    {
        return response()->json([
            $role->getPermissionNames()
        ]);
    }
}
