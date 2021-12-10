<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:roles-read')->only(['index']);
        $this->middleware('permission:roles-create')->only(['create','store']);
        $this->middleware('permission:roles-update')->only(['edit','update']);
        $this->middleware('permission:roles-delete')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = ['admins','roles','references','introductions','contacts','messages','settings','abouts'];
        $actions = ['create', 'read', 'update', 'delete'];
       $role =  Role::idDescending()->whereRoleNot(['super_admin'])->with('permissions')->get();
       return view('admin.roles.index',compact(['role','models','actions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        $role = Role::create($request->all());
        $role->attachPermissions($request->permissions);
        toastr()->success('تم الحفظ بنجاح');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $models = ['admins','roles','references','introductions','messages','contacts','settings','abouts'];
        $actions = ['create', 'read', 'update', 'delete'];
        $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact('role','models','actions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $request->validate([
            'name' => ['required',Rule::unique('roles')->ignore($id)],
            'permissions' => 'required|array|min:1',
        ]);
        $role->update($request->all());
        $role->syncPermissions($request->permissions);
        toastr()->info('تم التعديل بنجاح');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $status = $role->delete();
            if ($status) {
                toastr()->error('تم الحذف بنجاح');
                return redirect()->route('roles.index');
            } else {
                return redirect()->with('error', 'هناك خطأ ما !!');
            }
        } else {
            return back()->with('error', 'هذه البيانات غير موجودة');
        }
    }
}
