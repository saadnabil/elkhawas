<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImportExcelValidation;
use App\Imports\ItemsImport;
use App\Models\Item;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{

    public function import(ImportExcelValidation $request)
    {
        $data = $request->validated();
        Excel::import(new ItemsImport,  $data['file']);
        session()->flash('success', __('translation.Imported Successfully'));
        return redirect()->route('admin.items.index');
    }

}
