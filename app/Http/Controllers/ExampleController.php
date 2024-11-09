<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function example($nama, $npm)
    {
        return view('example', compact('nama', 'npm'));
    }
    
}
