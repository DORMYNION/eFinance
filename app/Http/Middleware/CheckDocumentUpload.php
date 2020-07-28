<?php

namespace App\Http\Middleware;

use App\Document;
use App\Notifications\UploadDocumentNotification;
use App\User;
use Closure;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckDocumentUpload
{
    use Notifiable;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $data;

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if(Session::previousUrl() == url('login')) {


            foreach(Document::DOCUMENT_TYPE_SELECT as $key => $label) {
                if(Document::where('document_type', $key)->doesntExist()) {
                    $this->data[] = $key;
                }
            }

            $rej = Document::Where('status', 'Rejected')->get();

            if($rej->count()) {
                foreach ($rej as $key => $value) {
                    $this->data[] = $value->document_type;
                }
            }

            if ($this->data) {
                session()->flash('document_type', implode(', ', $this->data));
                # code...
            }
            
            if(!$user->profile_image) {
                session()->flash('profile_image', 'Kindly Upload a profile picture.');
            }
            
            // $user->notify(new UploadDocumentNotification($this->data));
        }

        return $next($request);
    }
}
