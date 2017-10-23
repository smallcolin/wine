<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Wine;
use App\Customer;

use Illuminate\Http\Request;
use Session;

class CustomerCommentController extends Controller
{
  // Customer comments
  public function index()
  {
    // Get all entries
    $wine = Wine::all();
    // Get the id of the logged in user
    $id = Auth::guard('customer')->user()->id;
    // Get all comments created by the logged in user
    $comments = Comment::where('customer_id', $id)->latest()->paginate(5);

    // Send to page
    return view('customers.comments.index')->with('comments', $comments)->with('wine', $wine);
  }

  // And save it to the database
  public function store()
  {
    // Validate entered user data
    $this->validate(request(), [
      'wine_id' => 'required',
      'customer_id' => 'required',
      'title' => 'required|max:40',
      'body' => 'required|max:100',
      'rating' => 'required',
    ]);

    // Send data to database
    $comment = Comment::create([
      'wine_id' => request()->wine_id,
      'customer_id' => request()->customer_id,
      'title' => request()->title,
      'body' => request()->body,
      'rating' => request()->rating,
    ]);

    // Onscreen message
    Session::flash('success', 'New comment was added for this wine');

    // Route back to the same page
    return redirect()->back();
  }

  // Edit a comment (customer area)
  public function edit(Comment $comment)
  {
    // Get all entries from Wine table
    $wine = Wine::all();
    // Show comment edit form
    return view('customers.comments.edit')->with('comment', $comment)->with('wine', $wine);
  }

  // Update a comment (customer area)
  public function update($id)
  {
    // Validate entered user data
    $this->validate(request(), [
      'wine_id' => 'required',
      'title' => 'required|max:40',
      'body' => 'required|max:191',
      'rating' => 'required',
    ]);
    // Find id from database
    $comment = Comment::findOrFail($id);
    // Enter updated data to database
    $comment->wine_id = request()->wine_id;
    $comment->title = request()->title;
    $comment->body = request()->body;
    $comment->rating = request()->rating;
    // Save to database
    $comment->save();

    // Show message
    Session::flash('success', 'Comment was updated!');

    // redirect user to all wines page
    return redirect('customers/comments');
  }


  // Delete a commment (customer area)
  public function destroy($id)
  {
    // Collect correct comment from database table & delete it
    $comment = Comment::findOrFail($id);
    $comment->delete();

    // Display a message
    Session::flash('success', 'Comment has been deleted successfully');
    // redirect back to all comments
    return redirect('customers/comments');
  }
}
