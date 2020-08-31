<?php

namespace App\Http\Middleware;

use App\Document;
use Closure;
use Illuminate\Notifications\Notifiable;

class CheckDocumentUpload
{
    use Notifiable;
    
    public $data;

    public function handle($request, Closure $next)
    {
        $user = auth()->user();

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
        } else {
            session()->forget('document_type');
        }
        
        if($user->payment_method === null) {
            session()->flash('customer_code', 'Kindly add your payment method to verify your account and to approve your loan.');
        } else {
            session()->forget('customer_code');
        }

        return $next($request);
    }
}
