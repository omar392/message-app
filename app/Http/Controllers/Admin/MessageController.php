<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:messages-read')->only(['index']);
        $this->middleware('permission:messages-create')->only(['create', 'store']);
        $this->middleware('permission:messages-update')->only(['edit', 'update']);
        $this->middleware('permission:messages-delete')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Message::get();
        return view('admin.message.index',compact('message'));
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
            'title_ar'=>'string|required',
            'title_en'=>'string|required',
            'message_ar'=>'string|required',
            'message_en'=>'string|required',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data = $request->all();
        $status = Message::create($data);
        if($status){
            toastr()->success('تم الحفظ بنجاح');
            return redirect()->route('message.index');
        }else{
            return back()->with('error','هناك خطأ ما !!');
        }
    }
    public function messageStatus(Request $request){

        // dd($request->all());
        if($request->mode=='true'){
            DB::table('messages')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('messages')->where('id',$request->id)->update(['status'=>'inactive']);
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
        $message = Message::find($id);
        if($message){
            return view('admin.message.edit',compact('message'));
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
        $message = Message::find($id);
        if($message){
            $this->validate($request,[
                'title_ar'=>'string|required',
                'title_en'=>'string|required',
                'message_ar'=>'string|required',
                'message_en'=>'string|required',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data = $request->all();
            $status = $message->fill($data)->save();
            if($status){
                toastr()->info('تم التعديل بنجاح');
                return redirect()->route('message.index');
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
        $message = Message::find($id);
        if($message){
        $status=$message->delete();
        if($status){
            toastr()->error('تم الحذف بنجاح');
            return redirect()->route('message.index');
        }else{
            return redirect()->with('error','هناك خطأ ما !!');
        }
        }else{
            return back()->with('error','هذه البيانات غير موجودة');
        }
    }
}
