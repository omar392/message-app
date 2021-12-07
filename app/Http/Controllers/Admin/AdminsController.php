<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmin;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
   
    
    public function __construct()
    {
        $this->middleware('permission:admins-read')->only(['index']);
        $this->middleware('permission:admins-create')->only(['create', 'store']);
        $this->middleware('permission:admins-update')->only(['edit', 'update']);
        $this->middleware('permission:admins-delete')->only(['destroy']);
    }

    public function index()
    {
        $data['admins'] = Admin::where('name', '!=', 'super_admin')->get();
        $roles = Role::WhereRoleNot(['super_admin'])->get();
        return view('admin.admins.index', $data,compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $admin =  Admin::create($request->all());
        $admin->attachRoles([$request->role_id]);
        toastr()->success('تمت الاضافة بنجاح');
        return redirect()->route('admins.index');
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
        $roles = Role::WhereRoleNot(['super_admin'])->get();
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('roles', 'admin'));
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
        $admin = Admin::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',Rule::unique('admins')->ignore($admin->id),
            ],
            'role_id' => 'required',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $admin->update($request->all());
        $admin->syncRoles([$request->role_id]);
        toastr()->info('تم التعديل بنجاح');
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if($admin){
        $status=$admin->delete();
        if($status){
            toastr()->error('تم الحذف بنجاح');
            return redirect()->route('admins.index');
            
        }else{
            return redirect()->with('error','هناك خطأ ما !!');
        }
        }else{
            return back()->with('error','هذه البيانات غير موجودة');
        }
    }
}
