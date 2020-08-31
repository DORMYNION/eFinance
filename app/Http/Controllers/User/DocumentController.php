<?php

namespace App\Http\Controllers\User;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\UserDocument;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    use MediaUploadingTrait;

    public function __construct()
    {
        $this->middleware(['auth', 'can:user']);
    }

    public function index(Document $document)
    {
        $user = auth()->user();

        return view('user.document.index', compact('user'));
    }

    public function store(Request $request)
    {
        $document = Document::create($request->all() + ['user_id' => auth()->user()->id]);

        if ($request->input('document_file', false)) {
            if (!$document->document_file || $request->input('document_file') !== $document->document_file->file_name) {
                $document->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
            }
        } elseif ($document->document_file) {
            $document->document_file->delete();
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $document->id]);
        }

        return redirect()->route('user.document')->with('message', __('global.document_upload_success'));   
    }

    public function delete(Request $request)
    {        
        $userDocument = UserDocument::find($request->id);
        $userDocument->delete();

        return back()->with('message', __('global.document_delete_success'));
    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Document();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
