<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! \Auth::user()->admin){
            $loggedUserId = \Auth::user()->id;
            $posts = Post::where('user_id',$loggedUserId)->orderBy('created_at','desc')->paginate(5);
            return view('admin.posts.index')->with('posts', $posts);
        }
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if (count($categories) == 0)
        {
            return redirect(route('category.create'))->with('info', 'You need to have categories created first.');
        }elseif(count($tags) == 0){
            return redirect(route('tag.create'))->with('info', 'You need to have tags created first.');
        }

        return view('admin.posts.create')->with(['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'featured'    => 'image|nullable|max:1999',
            'category_id' => 'required',
            'tags'        => 'required',
        ]);

        //Process Uploaded Image
        if ($request->hasFile('featured'))
        {
            $fileNameWithExt = $request->file('featured')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featured')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Store The Image
            $request->file('featured')->storeAs('public/uploads/posts', $fileNameToStore);
        } else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $userId = \Auth::user()->id;
        $post = Post::create([
            'title'       => $request['title'],
            'content'     => $request['content'],
            'featured'    => $fileNameToStore,
            'category_id' => $request['category_id'],
            'user_id'     => $userId,
            'slug'        => str_slug($request['title']),
        ]);

        $post->tags()->attach($request['tags']);
        return redirect(route('post.index'))->with('success', 'Post was created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        dd($post['title']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //Access control
        $loggedUserId = \Auth::user()->id;
        $postOwnerId = $post->user['id'];
        if ($loggedUserId != $postOwnerId && ! \Auth::user()->admin){
            return redirect()->back()->with('error','You are not authorized.');
        }

        if ($post->user['owner'] && ! \Auth::user()->owner){
            return redirect()->back()->with('error','You are not authorized.');
        }
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit')
            ->with(['categories' => $categories, 'post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post                $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Access control
        $loggedUserId = \Auth::user()->id;
        $postOwnerId = $post->user['id'];
        if ($loggedUserId != $postOwnerId && ! \Auth::user()->admin){
            return redirect()->back()->with('error','You are not authorized.');
        }
        if ($post->user['owner'] && ! \Auth::user()->owner){
            return redirect()->back()->with('error','You are not authorized.');
        }
        //Validation
        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'featured'    => 'image|nullable|max:1999',
            'category_id' => 'required',
            'tags'        => 'required'
        ]);

        //Process Uploaded Image
        if ($request->hasFile('featured'))
        {
            $fileNameWithExt = $request->file('featured')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featured')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //Store The Image
            $request->file('featured')->storeAs('public/uploads/posts', $fileNameToStore);
            if ($post['featured'] != 'noimage.jpg')
            {
                Storage::delete('/public/uploads/posts/' . $post['featured']);
            }
        } else
        {
            $fileNameToStore = $post['featured'];
        }

        //Update post
        $post->update([
            'title'       => $request['title'],
            'content'     => $request['content'],
            'featured'    => $fileNameToStore,
            'category_id' => $request['category_id'],
            'slug'        => str_slug($request['title']),
        ]);

        $post->tags()->sync($request['tags']);
        return redirect(route('post.index'))->with('success', 'Post was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $loggedUserId = \Auth::user()->id;
        $postOwnerId = $post->user['id'];
        if ($loggedUserId != $postOwnerId && ! \Auth::user()->admin){
            return redirect()->back()->with('error','You are not authorized.');
        }
        if ($post->user['owner'] && ! \Auth::user()->owner){
            return redirect()->back()->with('error','You are not authorized.');
        }
        $post->delete();
        return back()->with('success', 'Post trashed successfully.');
    }


    public function trashed()
    {
        if (! \Auth::user()->admin){
            $loggedUserId = \Auth::user()->id;
            $posts = Post::onlyTrashed()->where('user_id',$loggedUserId)->orderBy('created_at','desc')->paginate(5);
            return view('admin.posts.trashed')->with('posts', $posts);
        }
        $posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(5);
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function restoreTrashed($post)
    {
        $trashedPost = Post::onlyTrashed()->find($post);
        //Access control
        $loggedUserId = \Auth::user()->id;
        $postOwnerId = $trashedPost->user['id'];
        if ($loggedUserId != $postOwnerId && ! \Auth::user()->admin){
            return redirect()->back()->with('error','You are not authorized.');
        }
        if ($trashedPost->user['owner'] && ! \Auth::user()->owner){
            return redirect()->back()->with('error','You are not authorized.');
        }

        //Proceed
        $trashedPost->restore();
        return back()->with('success', 'Post restored successfully.');
    }

    public function deleteTrashed($post)
    {
        $trashedPost = Post::onlyTrashed()->find($post);
        //Access control
        $loggedUserId = \Auth::user()->id;
        $postOwnerId = $trashedPost->user['id'];
        if ($loggedUserId != $postOwnerId && ! \Auth::user()->admin){
            return redirect()->back()->with('error','You are not authorized.');
        }
        if ($trashedPost->user['owner'] && ! \Auth::user()->owner){
            return redirect()->back()->with('error','You are not authorized.');
        }

        //Proceed
        if ($trashedPost['featured'] != 'noimage.jpg')
        {
            Storage::delete('/public/uploads/posts/' . $trashedPost['featured']);
        }
        $trashedPost->forceDelete();
        return back()->with('success', 'Post deleted successfully.');
    }
}
