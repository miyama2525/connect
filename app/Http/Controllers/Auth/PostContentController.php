<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PostContent;
use App\Models\Category;
use App\Models\Emergency;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PDF;


class PostContentController extends Controller
{
    //
    public function detail_create($id) {
        $content = PostContent::where('id',$id);
        $contents = $content->get();
        return view('pdf_create',[
            'contents' => $contents
        ]);

    }
    public function pdf($id){
        $content = PostContent::where('id',$id);
        $contents = $content->get();
        $pdf = \PDF::loadView('pdf_create', compact('contents'));
        $pdf->setPaper('A4');
        return $pdf->stream();
    }

    public function create()
    {
        $category = new Category;
        $categories = $category->getLists();
        
        return view('post_content', [
            'categories' => $categories,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string','max:255'],
            'content' => ['nullable','string'],
            'other'=>['nullable','string'],
            'category_id'=>['required'],
        ]);

        $post_content = PostContent::create([
            'title' => $request->title,
            'content' => $request->content,
            'other' => $request->other,
            'category_id'=>$request->category_id
        ]);

        $category = new Category;
        $categories = $category->getLists();
        return view('post_complete', ['categories' => $categories]);
    }

    public function search(Request $request)
    {
        $categoryId = $request->input('categoryId'); //カテゴリの値
        $query = PostContent::query();

        //categoriesテーブルからcategory_idが一致するものを$queryに代入
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        //$queryを昇順に並び替えて$contentsに代入
        $contents = $query->orderBy('id','desc')->paginate(10);

        //categoriesテーブルからgetLists();関数でcategory_nameとidを取得する
        $category = new Category;
        $categories = $category->getLists();

        return view('post_content', [
            'contents' => $contents,
            'categories' => $categories,
            'categoryId' => $categoryId
        ]);
    }

    public function edit(Request $request,$id){
        $category = new Category;
        $categories = $category->getLists();
        $content = PostContent::where('id',$id);
        $contents = $content->get();

        return view('edit_content', ['contents' => $contents, 'categories' => $categories]);
    }

    public function up(Request $request){
        $request->validate([
            'title' => ['required', 'string','max:255'],
            'content' => ['nullable','string'],
            'other'=>['nullable','string'],
            'category_id'=>['required'],
        ]);

        $inputs = $request->all();
        $data = PostContent::find($inputs['id']);
        
        $data->fill([
            'title' => $inputs['title'],
            'content' => $inputs['content'],
            'other' => $inputs['other'],
            'category_id' => $inputs['category_id'],
        ]);
        $data->save();

        $category = new Category;
        $categories = $category->getLists();
        return view('post_complete', ['categories' => $categories]);

    }

    public function delete(Request $request,$id){
        $data = PostContent::where('id', $id);
        $data -> delete();
        return redirect(route('post_content'));
    }
}
