<?php

namespace App\Http\Controllers\User;

use Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateUserEmailRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller {

    use MediaUploadingTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index() {

        abort_if(Gate::denies('user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();

        return view('user.profile.index', compact('user'));
    }

    public function update(UpdateUserProfileRequest $request) {

        // dd($request);
        
        auth()->user()->update($request->validated());

        return redirect()->route('user.profile')->with('message', __('global.update_profile_success'));
    }

    public function password(UpdateUserPasswordRequest $request) {

        auth()->user()->update($request->validated());

        return redirect()->route('user.profile')->with('message', __('global.change_password_success'));
    }

    public function picture(Request $request) {
        
        auth()->user()->update($request->all());

        if ($request->input('profile_image', false)) {
            auth()->user()->addMedia(storage_path('tmp/uploads/' . $request->input('profile_image')))->toMediaCollection('profile_image');
        } elseif (auth()->user()->profile_image) {
            auth()->user()->profile_image->delete();
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => auth()->user()->id]);
        }

        return redirect()->route('user.profile')->with('message', __('global.profile_picture_success'));
    }

    public function email(UpdateUserEmailRequest $request) {

        auth()->user()->update($request->validated());

        return redirect()->route('user.profile')->with('message', __('global.change_email_success'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

}