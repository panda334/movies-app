<?php
namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        $save = $receiver->receive();

        if ($save->isFinished()) {
            return $this->saveFile($save->getFile());
        }

        $handler = $save->handler();
        return response()->json([
            "done"   => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    protected function saveFile(UploadedFile $file)
    {
        $fileName   = $this->createFilename($file);
        $mime       = str_replace('/', '-', $file->getMimeType());
        $dateFolder = date("Y-m-W");

        $relativePath = "upload/{$mime}/{$dateFolder}";
        $finalPath    = storage_path("app/public/{$relativePath}");

        $file->move($finalPath, $fileName);

        $fileUpload = new FileUpload();

        $fileUpload->link = "{$relativePath}/{$fileName}";
        $fileUpload->save();

        return response()->json([
            'path'      => asset("storage/{$relativePath}"),
            'name'      => $fileName,
            'mime_type' => $mime
        ]);
    }

    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename  = str_replace("." . $extension, "", $file->getClientOriginalName());
        $filename .= "_" . md5(time()) . "." . $extension;
        return $filename;
    }
}
