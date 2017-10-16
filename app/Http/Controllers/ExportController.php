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
  private function exportCSV($collection)
  {
    // Create headers for exported file
    header('Content-Disposition: attachment; filename="export.csv"');
    header("Cache-control: private");
    header("Content-type: application/force-download");
    header("Content-transfer-encoding: binary\n");

    $data = $collection->toArray();

    $out = fopen('php://output', 'w');

    fputcsv($out, array_keys($data[0]));
    foreach($data as $line)
    {
      fputcsv($out, $line);
    }
    fclose($out);
  }

  public function download()
  {
    // Receive the chosen table data number
    $collection = request()->tableToExport;

    // Perform the task
    switch ($collection) {
      case 1:
      $this->exportCSV(Comment::all());
      break;
      case 2:
      $this->exportCSV(Country::all());
      break;
      case 3:
      $this->exportCSV(Customer::all());
      break;
      case 4:
      $this->exportCSV(Order::all());
      break;
      case 5:
      $this->exportCSV(Wine::all());
      break;
    }
  }








}
