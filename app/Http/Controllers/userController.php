<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\PetUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    public function index(){
        $news_posts=Post::orderBy('created_at', 'desc')->get();
       $post_adopts=Pet::where('approve','=',1)->get();
    return view('home_user',compact('news_posts','post_adopts'));
    }
    public function post_pet(){
        return view('form_post_pet');
    }
    public function create_post_pet(Request $request){
        $new_pet= new Pet;
        $new_pet->name = $request->name;
        $new_pet->type = $request->type;
        $new_pet->gender = $request->gender;
        $name=$request->file('pet_photo')->getClientOriginalName();
        $request->file('pet_photo')->storeAs('public/Image/',$name);
        $new_pet->pet_photo = $name;
        $new_pet->color = $request->color;
        $new_pet->species = $request->species;
        $new_pet->weight = $request->weight;
        $new_pet->special_needs = $request->special_needs;
        $new_pet->detail = $request->detail;
        $new_pet->vacine = $request->vacine;
        $new_pet->user_id = Auth::user()->id;
        $new_pet->save();
        return redirect('/form/post/pet');
    }
    public function profile(){
        return view('profile_user');
    }
    public function form_to_adopt(){
        return view('form_to_adopt');
    }
    public function update_form(Request $request){
        $new_form_adopt=User::findOrFail(Auth::user()->id);
        $new_form_adopt->address = $request->address;
        $new_form_adopt->occupation = $request->occupation;
        $new_form_adopt->salary = $request->salary;
        $new_form_adopt->birthdate=$request->birthdate;
        $new_form_adopt->phone_number=$request->phone_number;
        $name=$request->file('home_photo')->getClientOriginalName();
        $request->file('home_photo')->storeAs('public/Image/',$name);
        $new_form_adopt->home_photo = $name;
        $new_form_adopt->detail = $request->detail;
        $new_form_adopt->save();
        return redirect('/profile_user'); 
    }
    public function adopt($pet_id){
        if(Auth::user()->address==null){
            return redirect('/form/to_adopt');
        }
        $num_request = PetUser::where("pet_id",'=', $pet_id)->where('adopt_id','=',Auth::user()->id)->count();
        if($num_request>=1){
            return redirect('/profile_user');
        }else{
            $request_to_adopt=new PetUser;
            $request_to_adopt->pet_id=$pet_id;
            $request_to_adopt->adopt_id=Auth::user()->id;
            $request_to_adopt->selected=0;
            $request_to_adopt->save();
            return redirect('/home');
        }
    }
    public function history_post(){
        $pets=Pet::where('user_id','=',Auth::user()->id)->get();
        $user_requests=PetUser::all();
        return view('history_post',compact('user_requests','pets'));
    }
    public function confirm($id){
        $pet=Pet::findOrFail($id);
        $user_requests=PetUser::where('pet_id','=',$id)->get();
        return view('confirm',compact('user_requests','pet'));
    }
    public function findhome_dog(){
        $dogs=Pet::where('approve','=',1)->where('type','=','dog')->orderBy('created_at', 'desc')->get();
        return view('findhome_dog',compact('dogs'));
    }
    public function findhome_cat(){
        $cats=Pet::where('approve','=',1)->where('type','=','cat')->orderBy('created_at', 'desc')->get();
        return view('findhome_cat',compact('cats'));
    }
    public function show_detail_dog($id){
        $dog=Pet::findOrFail($id);
        return view('detail_dog',compact('dog'));
    }
    public function show_detail_cat($id){
        $cat=Pet::findOrFail($id);
        return view('detail_cat',compact('cat'));
    }

    public function owner_confirm(request $request){
        $show =$request->get('var1');
        $show1=$request->get('var2');
        $selectedPet = PetUser::where('adopt_id', $show)->where('pet_id',$show1)->first();
        if ($selectedPet) {
            $selectedPet->selected = 1;
            $selectedPet->save();
            
            PetUser::where('adopt_id', '!=', $show)->where('pet_id',"=",$show1)->delete();
        }
        
        return redirect('/history/post');
    }
    public function  success_adopt(){
        $show=PetUser::where('adopt_id','=',Auth::user()->id)->where('selected','=',1)->get();
        return view('success_adopt',compact('show'));
        
    }
    public function example(){
        $news_posts=Post::orderBy('created_at', 'desc')->get();
        return view('example',compact('news_posts'));
    }

    
    
}
