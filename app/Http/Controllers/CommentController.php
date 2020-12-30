<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment($id,Request $request)
    {
        // $comment = new Comment;
        // $comment;
        // $comment -> idUser = Auth::use()->id;
    }
}
