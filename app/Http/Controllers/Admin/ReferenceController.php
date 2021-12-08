<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:references-read')->only(['index']);
        $this->middleware('permission:references-create')->only(['create','store']);
        $this->middleware('permission:references-update')->only(['edit','update']);
        $this->middleware('permission:references-delete')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reference = Reference::get();
        return view('admin.reference.index',compact('reference'));
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'url'=>'string|required',
            'name_ar'=>'string|required',
            'name_en'=>'string|required',
            'description_ar'=>'string|required',
            'description_en'=>'string|required',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data = $request->all();
        $status = Reference::create($data);
        if($status){
            toastr()->success('تم الحفظ بنجاح');
            return redirect()->route('reference.index');
        }else{
            return back()->with('error','هناك خطأ ما !!');
        }
    }

    
    public function referenceStatus(Request $request){

        if($request->mode=='true'){
            DB::table('references')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('references')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'تم تغيير الحالة بنجاح','status'=>true]);
        
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
        $reference = Reference::find($id);
        if($reference){
            return view('admin.reference.edit',compact('reference'));
        }else{
            return back()->with('error','هذه البيانات غير موجودة');
        }
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
        $reference = Reference::find($id);
        if($reference){
            $this->validate($request,[
                'url'=>'string|required',
                'name_ar'=>'string|required',
                'name_en'=>'string|required',
                'description_ar'=>'string|required',
                'description_en'=>'string|required',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data = $request->all();
            $status = $reference->fill($data)->save();
            if($status){
                toastr()->info('تم التعديل بنجاح');
                return redirect()->route('reference.index');
            }else{
                return back()->with('error','هناك خطأ ما !!');
            }
        }else{
            return back()->with('error','هذه البيانات غير موجودة');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = Reference::find($id);
        if($reference){
        $status=$reference->delete();
        if($status){
            toastr()->error('تم الحذف بنجاح');
            return redirect()->route('reference.index');
        }else{
            return redirect()->with('error','هناك خطأ ما !!');
        }
        }else{
            return back()->with('error','هذه البيانات غير موجودة');
        }
    }
}
