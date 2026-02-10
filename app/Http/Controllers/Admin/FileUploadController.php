<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Throwable;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        // Some production environments silently return false when the public disk
        // is not writable. Fallback to public/storage/uploads to keep behavior stable.
        if (!$path) {
            $path = $this->storeInPublicStorage($file);
        }

        if (!$path) {
            return response()->json([
                'message' => 'Upload failed. Please check storage write permissions.',
            ], 500);
        }

        return response()->json(['path' => $path]);
    }

    private function storeInPublicStorage(UploadedFile $file): ?string
    {
        $targetDirectory = public_path('storage/uploads');

        try {
            File::ensureDirectoryExists($targetDirectory);

            $extension = $file->getClientOriginalExtension();
            $filename = Str::ulid()->toBase32();
            if ($extension !== '') {
                $filename .= '.' . strtolower($extension);
            }

            $file->move($targetDirectory, $filename);

            return 'uploads/' . $filename;
        } catch (Throwable) {
            return null;
        }
    }
}
