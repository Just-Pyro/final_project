<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment (Request $request, $post_id){
        $inputField = $request->validate([
            'comment' => 'required'
        ]);

        $inputField['comment'] = strip_tags($inputField['comment']);
        $inputField['user_id'] = auth()->id();
        $inputField['post_id'] = $post_id;

        Comment::create($inputField);

        return redirect('/show-all-post');
    }
}
