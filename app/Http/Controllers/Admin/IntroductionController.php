<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntroductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:introductions-read')->only(['index']);
        $this->middleware('permission:introductions-create')->only(['create', 'store']);
        $this->middleware('permission:introductions-update')->only(['edit', 'update']);
        $this->middleware('permission:introductions-delete')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $introduction = Introduction::get();
        return view('admin.introduction.index',compact('introduction'));
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

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_ar'=>'string|required',
            'title_en'=>'string|required',
            'message_ar'=>'string|required',
            'message_en'=>'string|required',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data = $request->all();
        $status = Introduction::create($data);
        if($status){
            toastr()->success('تم الحفظ بنجاح');
            return redirect()->route('introduction.index');
        }else{
            return back()->with('error','هناك خطأ ما !!');
        }
    }

    public function introductionStatus(Request $request){

        // dd($request->all());
        if($request->mode=='true'){
            DB::table('introductions')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('introductions')->where('id',$request->id)->update(['status'=>'inactive']);
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
        $introduction = Introduction::find($id);
        if($introduction){
            return view('admin.introduction.edit',compact('introduction'));
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
        $introduction = Introduction::find($id);
        if($introduction){
            $this->validate($request,[
                'title_ar'=>'string|required',
                'title_en'=>'string|required',
                'message_ar'=>'string|required',
                'message_en'=>'string|required',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data = $request->all();
            $status = $introduction->fill($data)->save();
            if($status){
                toastr()->info('تم التعديل بنجاح');
                return redirect()->route('introduction.index');
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
        $introduction = Introduction::find($id);
        if($introduction){
        $status=$introduction->delete();
        if($status){
            toastr()->error('تم الحذف بنجاح');
            return redirect()->route('introduction.index');
        }else{
            return redirect()->with('error','هناك خطأ ما !!');
        }
        }else{
            return back()->with('error','هذه البيانات غير موجودة');
        }
    }
}
