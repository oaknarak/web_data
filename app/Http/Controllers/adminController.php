<?php

namespace App\Http\Controllers;

use App\Models\Form_to_adopt;
use App\Models\Form_to_adoptPet;
use Auth;
use Illuminate\Http\Request;
use App\Models\Post_type;
use App\Models\Post;
use App\Models\Pet;
use App\Models\User;

class AdminController extends Controller
{
    // public function show(){
    //     return view('/home_admin');
    // }
    // public function index(){
    //     $posts=Post::orderBy('created_at', 'desc')->get();
    //     return view('home_admin',compact('posts'));
    // }

    public function index2(){
        $news_posts=Post::orderBy('created_at', 'desc')->get();

    return view('home_admin',compact('news_posts'));
    }
    public function form_post_type(){
        $post_types=Post_type::all();
        return view('form_post_type',compact('post_types'));
    }
    public function create_post_type(Request $request){
        $request->validate([
            'type' => ['unique:post_types','max:255','min:3','alpha_num']
        ],[
            'type.unique' => 'มีหัวข้อนี้อยู่แล้ว',
            'type.min' => 'กรุณากรอกหัวข้อที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'type.max'=> 'กรุณากรอกหัวข้อที่มีความยาวน้อยกว่าหรือเท่ากับ 255 ตัวอักษร',
            'type.alpha_num'=>'กรุณากรอกหัวข้อที่เป็นตัวอักษรหรือตัวเลขเท่านั้น'
        ]);
        $new_post_type= new Post_type;
        $new_post_type->type = $request->type;
        $new_post_type->save();
        return redirect('/form/post_type')->with('success','บันทึกหัวข้อสำเร็จ');
    }
    public function show_detail_post_type($id){
        $post_type=Post_type::findOrFail($id);
        return view('detail_post_type',compact('post_type'));
    }
    public function edit_post_type($id){
        $post_type=Post_type::findOrFail($id);
        return view('edit_post_type',compact('post_type'));
    }
    public function update_post_type(Request $request,$id){
        $request->validate([
            'type' => ['unique:post_types','max:255','min:3','alpha_num']
        ],[
            'type.unique' => 'มีหัวข้อนี้อยู่แล้ว',
            'type.min' => 'กรุณากรอกหัวข้อที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'type.max'=> 'กรุณากรอกหัวข้อที่มีความยาวน้อยกว่าหรือเท่ากับ 255 ตัวอักษร',
            'type.alpha_num'=>'กรุณากรอกหัวข้อที่เป็นตัวอักษรหรือตัวเลขเท่านั้น'
        ]);
        $update_post_type=Post_type::findOrFail($id);
        $update_post_type->type = $request->type;
        $update_post_type->save();
        return redirect('/form/post_type');
    }


    public function form_post(){
        $post_types=Post_type::all();
        return view('form_post',compact('post_types'));
    }
    public function create_post(Request $request){
        $request->validate([
            'header'=>['max:255','min:3'],
            'detail'=>['unique:posts','min:3'],
            'photo'=>['file','mimes:jpeg,png','dimensions:min_width=100,min_height=100','max:2048'],
            'source'=>['max:255','min:3']
        ],[
            'header.max'=>'กรุณากรอกชื่อหัวข้อที่มีความยาวน้อยกว่าหรือเท่ากับ 255 ตัวอักษร',
            'header.min'=>'กรุณากรอกชื่อหัวข้อที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'detail.unique'=>'มีเนื้อหานี้อยู่แล้ว',
            'detail.min'=>'กรุณากรอกเนื้อหาที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'photo.mimes'=>'กรุณาเลือกไฟล์รูปภาพที่มีชนิดเป็น JPEG หรือ PNG',
            'photo.dimensions'=>'ไฟล์รูปภาพต้องมีขนาดมากกว่า 100x100 pixels',
            'photo.max'=>'ไฟล์รูปภาพต้องมีขนาดน้อยกว่า 2MB',
            'source.max'=>'กรุณากรอกที่มาที่มีความยาวน้อยกว่าหรือเท่ากับ 255 ตัวอักษร',
            'source.min'=>'กรุณากรอกที่มาที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร'
        ]);
        $new_post= new Post;
        $new_post->post_type_id = $request->type;
        $new_post->header = $request->header;
        $new_post->detail = $request->detail;
        $name=$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('public/Image/',$name);
        $new_post->photo = $name;
        $new_post->source = $request->source;
        $new_post->admin_id = auth()->user()->id;
        $new_post->save();
        return redirect('/form/post')->with('success','โพสต์ข้อมูลข่าวสารสำเร็จ');
    }
    public function show_detail_post($id){
        $post=Post::findOrFail($id);
        return view('detail_post',compact('post'));
    }
    public function edit_post($id){
        $post_types=Post_type::all();
        $post=Post::findOrFail($id);
        return view('edit_post',compact('post','post_types'));
    }
    public function update_post(Request $request,$id){
        $request->validate([
            'header'=>['max:255','min:3'],
            'detail'=>['min:3'],
            'photo'=>['file','mimes:jpeg,png','dimensions:min_width=100,min_height=100','max:2048'],
            'source'=>['max:255','min:3']
        ],[
            'header.max'=>'กรุณากรอกชื่อหัวข้อที่มีความยาวน้อยกว่าหรือเท่ากับ 255 ตัวอักษร',
            'header.min'=>'กรุณากรอกชื่อหัวข้อที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'detail.min'=>'กรุณากรอกเนื้อหาที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'photo.mimes'=>'กรุณาเลือกไฟล์รูปภาพที่มีชนิดเป็น JPEG หรือ PNG',
            'photo.dimensions'=>'ไฟล์รูปภาพต้องมีขนาดมากกว่า 100x100 pixels',
            'photo.max'=>'ไฟล์รูปภาพต้องมีขนาดน้อยกว่า 2MB',
            'source.max'=>'กรุณากรอกที่มาที่มีความยาวน้อยกว่าหรือเท่ากับ 255 ตัวอักษร',
            'source.min'=>'กรุณากรอกที่มาที่มีความยาวไม่ต่ำกว่า 3 ตัวอักษร',
            'source.alpha_num'=>'กรุณากรอกที่มาที่เป็นตัวอักษรหรือตัวเลขเท่านั้น'
        ]);
        $update_post=Post::findOrFail($id);
        $update_post->post_type_id = $request->type;
        $update_post->header = $request->header;
        $update_post->detail = $request->detail;
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/Image/', $name);
            $update_post->photo = $name;
        }
        $update_post->source = $request->source;
        $update_post->save();
        return redirect('/home_admin');
    }
    public function delete_post($id){
        Post::destroy($id);
        return redirect('/home_admin');
    }
    public function trashed_post(){
        $trashed_posts=Post::onlyTrashed()->get();
        return view('trashed_post',compact('trashed_posts'));
    }
    public function restore_post($id){
        Post::withTrashed()->find($id)->restore();
        return redirect('/trashed/post')->with('success','กู้คืนโพสต์ข่าวสารสำเร็จ');
    }
    public function profile(){
        return view('profile');
    }
    public function approve(){
        $pets=Pet::where('approve','=',0)->get();
        return view('approve',compact('pets'));
    }
    public function create_post_adopt($id){
        $post_adopt=Pet::findOrFail($id);
        $post_adopt->approve=1;
        $post_adopt->save();
        return redirect('/approve')->with('success','อนุมัติโพสต์สำเร็จ');
    }
    public function approve_pet($id){
        $pet=Pet::findOrFail($id);
        return view('approve_pet',compact('pet'));
    }
}
