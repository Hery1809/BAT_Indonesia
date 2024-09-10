<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDepoModel;
use App\Models\FilestockcountModel;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    
    {
        $depo = DataDepoModel::all();

        $perPage = $request->input('perPage', 10);
        $search = $request->input('search') ?? '';
        $depo_id = $request->input('depo_id') ?? '';

        $data = $this->stock_count_attachment($depo_id, $perPage, $search);        

        return view('pages.admin.FileManager.index', compact('depo', 'data', 'search', 'depo_id'));
    
    
    
    }

    public function download($file)
    {
        $path = storage_path('public/files/' . $file); // Sesuaikan path file

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    public function stock_count_attachment($depo_id,$perPage,$search)
    {

        $query = FilestockcountModel::query();
        if ($search) {
            $query->where('sca_month', 'LIKE', "%$search%");
            $query->orWhere('sca_year', 'LIKE', "%$search%");
            $query->orWhere('sca_week', 'LIKE', "%$search%");
        }

        if ($depo_id) {
            $query->where('depo_id', $depo_id);
        }

        $stock_count_attachment = $query->paginate($perPage);
        return $stock_count_attachment;
        
    }

}