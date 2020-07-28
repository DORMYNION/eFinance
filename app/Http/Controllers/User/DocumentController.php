<?php

namespace App\Http\Controllers\User;

use Gate;
use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        abort_if(Gate::denies('user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $user = Auth::user();
        $user = auth()->user();

        // $document->load('user');

        $user->load('userDocuments');

        // dd($user->userDocuments);$date->format('Y-m-d H:i:s')18 Dec, 2019 01:02 PM,15 Jul, 2020 19:05 pm
        // dd($user->userDocuments[0]->created_at->format('d M, Y H:i A'));

        return view('user.document.index', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $document = Document::create($request->all() + ['user_id' => auth()->user()->id]);

        // if ($request->input('document_file', false)) {
        //     $document->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
        // }

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
        abort_if(Gate::denies('user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Document();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
