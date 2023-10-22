<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class zipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'zip_file' => 'required | mimes:zip'
        ]);

        // store zip images in the extracted folder
        $zipFile = $request->file('zip_file');
        $extractedPath = 'extracted/' . uniqid();

        $zip = new ZipArchive;
        if ($zip->open($zipFile) == true) {
            $zip->extractTo('storage/' . $extractedPath);
            $zip->close();
        }

        //move and uploaded files in images folder and save into
        $zipFileName = $zipFile->getClientOriginalName();
        $innerFolderName = pathinfo($zipFileName, PATHINFO_FILENAME);
        // dd($zipFileName);

        $extractedFolderPath = storage_path('app/public/' . $extractedPath . '/');

        // dd($extractedFolderPath);

        $extractedFiles = File::allFiles($extractedFolderPath);

        // dd($extractedFiles);

        foreach ($extractedFiles as $file) {
            $newFolderName = 'images/';
            $newFolderPath = storage_path('app/public/'.$newFolderName);

            if (!File::exists($newFolderPath)) {
                File::makeDirectory($newFolderPath, 0775, true);
            }
            $newfilePath = $newFolderPath. $file->getFilename();
            File::move($file->getPathname(), $newfilePath);

            //save into database
            
        }


        // Now $extractedFolderPath should exist, and you can proceed with your operations.
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
