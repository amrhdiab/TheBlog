<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Newsletter;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('created_at', 'desc')->take(3)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
        return view('pages.index')->with([
            'settings'    => $settings,
            'categories'  => $categories,
            'first_post'  => $first_post,
            'second_post' => $second_post,
            'third_post'  => $third_post,
        ]);
    }

    /**
     * Display the specified resource.
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at', 'desc')->get();

        //Next and Previous post IDs
        $next_id = Post::where('id', '>', $post['id'])->min('id');
        $prev_id = Post::where('id', '<', $post['id'])->max('id');

        //Next and Previous posts
        $nextPost = Post::where('id', $next_id)->first();
        $prevPost = Post::where('id', $prev_id)->first();

        return view('pages.single')->with([
            'post'     => $post,
            'settings' => $settings,
            'tags'     => $tags,
            'nextPost' => $nextPost,
            'prevPost' => $prevPost,
        ]);

    }

    public function categoryPosts(Category $category)
    {
        $posts = $category->posts()->orderBy('created_at','desc')->paginate(10);
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('pages.singleCategory')->with([
            'settings' => $settings,
            'posts'    => $posts,
            'tags'     => $tags,
            'category' => $category,
        ]);
    }

    public function tagPosts(Tag $tag)
    {
        $posts = $tag->posts()->orderBy('created_at','desc')->paginate(10);
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('pages.singleTag')->with([
            'settings' => $settings,
            'posts'    => $posts,
            'tags'     => $tags,
            'postTag' => $tag,
        ]);
    }

    public function allCategories()
    {
        $categories = Category::orderBy('created_at','desc')->get();
        $settings = Setting::first();
        return view('pages.categories')->with([
            'settings' => $settings,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request){

        $posts = Post::where('title','like','%'.$request['query'].'%')->orderBy('created_at','desc')->paginate(10);
        $settings = Setting::first();
        $tags = Tag::orderBy('created_at','desc')->get();
        return view('pages.searchResult')->with([
            'settings' => $settings,
            'posts' => $posts,
            'query' => $request['query'],
            'tags' => $tags,
        ]);
    }

    public function newsletter(Request $request){
        $email = $request['email'];
        Newsletter::subscribe($email);

        return redirect()->back()->with('success','Subscribed successfully.');
    }

    public function sendMessage(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'content' => 'required'
        ]);

        Message::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return redirect()->back()->with('success','Message sent successfully.');
    }

    public function aboutUs()
    {
        $settings = Setting::first();
        return view('pages.about')->with('settings', $settings);
    }

    public function contactUs()
    {
        $settings = Setting::first();
        return view('pages.contact')->with('settings', $settings);
    }
}
