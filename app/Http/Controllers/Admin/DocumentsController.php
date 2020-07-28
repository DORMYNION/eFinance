<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function update(Request $request)
    {
        $a = $request->all();
        
        Document::where('id', $a['id'])->update(['status' => $a['status']]);

        return back();
    }
}
