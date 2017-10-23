<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Wine;
use App\Customer;

use Illuminate\Http\Request;
use Session;

class CommentController extends Controller
{
    // Show all comments
    public function index()
    {
      // Collect all entries from database table
      $comments = Comment::paginate(5);
      // Direct browser to a page
      return view('admin.comments.index')->with('comments', $comments);
    }

    // Edit a comment
    public function edit(Comment $comment)
    {
      $wine = Wine::all();

      return view('admin.comments.edit')->with('comment', $comment)->with('wine', $wine);
    }

    // Update a comment
    public function update($id)
    {
      // Validate entered user data
      $this->validate(request(), [
        'wine_id' => 'required',
        'title' => 'required|max:40',
        'body' => 'required|max:191',
      ]);
      // Find id from database
      $comment = Comment::findOrFail($id);
      // Enter updated data to database
      $comment->wine_id = request()->wine_id;
      $comment->title = request()->title;
      $comment->body = request()->body;
      // Save to database
      $comment->save();

      // Show message
      Session::flash('success', 'Comment was updated!');

      // redirect user to all wines page
      return redirect('/admin/comments');
    }

    // Delete a comment
    public function destroy($id)
    {
      // Collect correct entry from table
      $comment = Comment::findOrFail($id);
      // Delete it
      $comment->delete();
      // Display a message
      Session::flash('success', 'Comment has been deleted successfully');
      // Redirect back to comments
      return redirect('/admin/comments/');
    }
}
