<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Model\Post;
use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class PostController extends Controller
{
    public function index()
    {
        //jangan lupa import model Post dengan cara klik kanan untuk import
        $post = ModelsPost::all();
        //berfungsi untuk mengatur jenis data yang akan ditampilkan
        return response()->json(['data' => $post]);
    }
    public function getResource()
    {
        $post = ModelsPost::all();
        //jangan lupa import PostResources
        return PostResource::collection($post);
    }
    public function show($id)
    {
        $post = ModelsPost::findOrFail($id);
        return new PostDetailResource($post);

    }

    public function show2($id)
    {
        $post = ModelsPost::with('writer:id,username')->findOrFail($id);
        return new PostDetailResource($post);
    }

    

}
