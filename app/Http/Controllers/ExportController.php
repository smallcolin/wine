<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Customer;
use App\Country;
use App\Order;
use App\Wine;
use Session;

class ExportController extends Controller
{
  public function exportCSV()
  {
    // Receive the chosen table data number
    $data = request()->tableToExport;

    // Perform the task 
    switch ($data) {
      case 1:
      echo 'You chose the Comments table';
      break;
      case 2:
      echo 'You chose the Countries table';
      break;
      case 3:
      echo 'You chose the Customers table';
      break;
      case 4:
      echo 'You chose the Orders table';
      break;
      case 5:
      echo 'You chose the Wines table';
      break;
    }

    // Dispplay a message
    Session('success', 'The CSV file was create successfully');
    // Send the user back
    redirect()->back();
  }

}
