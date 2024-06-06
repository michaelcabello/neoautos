<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoriesImport;
use App\Exports\CategoriesExport;
use App\Models\Category;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;
//use PDF;
//use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class CategoryController extends Controller
{
    public function store(Request $request){

        $file = $request->file('import_file');
        Excel::import(new CategoriesImport, $file);
        return redirect()->route('admin.products.index');
    }


    public function exportCategories()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }



    public function pdf()
    {
        $categories = Category::all();
        view()->share('categories.pdf', $categories);
        $pdf = PDF::loadView('categories.pdf',['categories' => $categories]);

        /* $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream(); */

       /* $categories = Category::paginate();
       return view('categories.pdf', compact('categories')); */

       return $pdf->download('categories.pdf');
    }


    public function ventapdf()
    {
        $categories = Category::all();
        view()->share('categories.pdf', $categories);
        $pdf = PDF::loadView('categories.ventapdf',['categories' => $categories]);

       return $pdf->download('categories.pdf');
    }


    public function generateslug()
    {
        $categories = Category::all();

        foreach($categories as $category){
            $category->update([
                'slug' => str::slug($category->name),
                'shortdescription' => Str::lower($category->name),
                'longdescription' => Str::lower($category->name),
                'image' => 'categories/'.str::slug($category->name).'.jpg',
                'title' => Str::lower($category->name),
                'description' => Str::lower($category->name),
                'keywords' => Str::lower($category->name),
            ]);
        }

        return redirect()->route('admin.products.index');


    }

}
