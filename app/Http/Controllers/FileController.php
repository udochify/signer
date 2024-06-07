<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Requests\VerifyFileRequest;
use App\Models\File;
use App\Models\User;
use App\Services\CurlNode;

class FileController extends Controller
{
    public function sign_index() : View
    {
        return view('pages.sign', ['files'=>auth()->user()->files, 'page'=>'sign']);
    }

    public function verify_index() : View
    {
        return view('pages.verify', ['page'=>'verify']);
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
    public function store(StoreFileRequest $request)
    {
        // user must have generated a signature
        if(!$request->user()->signature) {
            return Redirect::route('settings.edit')->with('signature_create_status', 'no-signature');
        }

        $file = new File;
        $crc = "";

        // if this is a local file
        if ($request->file) {
            $file->name = $request->file->getClientOriginalName();
            $file->path = "local";
            $file->size = $request->file->getSize();
            $file->hash = hash('sha3-256', file_get_contents($_FILES['file']['tmp_name']));
            $crc = hash('sha3-256', file_get_contents($_FILES['file']['tmp_name']) . $request->user()->signature);
        }

        //if this is a link
        if($request->link) {
            try {
                $head = Http::head($request->link);
                $size = $head->header('Content-Length');
                if(!$size) {
                    $v = ValidationException::withMessages(["link"=>"File is not a downloadable resource!"]);
                    $v->redirectTo = '/sign';
                    throw $v;
                }
                if(intval($size) > 3000000) {
                    $v = ValidationException::withMessages(["link"=>"File should not exceed 3000000B. Size is " . $size . "B!"]);
                    $v->redirectTo = '/sign';
                    throw $v;
                }
            } catch(ConnectionException $e) {
                $v = ValidationException::withMessages(["link"=>"Connection error. Try again!"]);
                $v->redirectTo = '/sign';
                throw $v;
            }

            $params = explode("/", $request->link);
            $file->name = $params[count($params)-1];
            $file->path = $request->link;
            $file->size = $size;
            $file->hash = hash('sha3-256', file_get_contents($request->link));
            $file->is_url = 1;
            $crc = hash('sha3-256', file_get_contents($request->link) . $request->user()->signature);
        }

        $file->user_id = $request->user()->id;
        $file->privacy_email = $request->user()->privacy_email;
        $file->privacy_name = $request->user()->privacy_name;
        $file->privacy_address = $request->user()->privacy_address;
        $file->privacy_phone = $request->user()->privacy_phone;
        $file->privacy_gender = $request->user()->privacy_gender;


        $response = CurlNode::post('/upload', [
            'address' => $request->user()->signature,
            'name' => $file->name,
            'path' => 'uploads/' . $file->user_id . '/' .$file->name,
            'hash' => $crc,
            'key' => $request->key
        ]);

        if(!session('connect_error')) {
            $file->address = $response->address;
            $file->save();
        } else {
            $e = ValidationException::withMessages(["file"=>session('connect_error_message')]);
            $e->redirectTo = '/sign';
            throw $e;
        }

        return Redirect::route('sign')->with('signing_status', 'signing-successful');
    }

    public function verify(VerifyFileRequest $request) {
        // if this is a file
        if($request->file) {
            $content = file_get_contents($_FILES['file']['tmp_name']);
            $hash = hash('sha3-256', $content);
        }

        // if this is a link
        if($request->link) {
            try {
                $head = Http::head($request->link);
                $size = $head->header('Content-Length');
                if(!$size) {
                    $v = ValidationException::withMessages(["link"=>"File is not a downloadable resource!"]);
                    $v->redirectTo = '/sign';
                    throw $v;
                }
                if(intval($size) > 3000000) {
                    $v = ValidationException::withMessages(["link"=>"File should not exceed 3000000B. Size is " . $size . "B!"]);
                    $v->redirectTo = '/sign';
                    throw $v;
                }
            } catch(ConnectionException $e) {
                $v = ValidationException::withMessages(["link"=>"Connection error. Try again!"]);
                $v->redirectTo = '/sign';
                throw $v;
            }

            $content = file_get_contents($request->link);
            $hash = hash('sha3-256', $content);
        }

        $file = File::where('hash', $hash)->first();
        
        if($file) {
            $response = CurlNode::post('/crc', [
                'address' => $file->address,
                'hash' => hash('sha3-256', $content . $file->user->signature)
            ]);
    
            if(!session('connect_error')) {
                if($response->status = "Passed") {
                    session()->flash('verify_status', 'verify-successful');
                    return view('pages.verify', ['file'=>$file, 'user'=>$file->user, 'page'=>'verify']);
                    // return Redirect::route('verify', ['file'=>$file, 'user'=>$file->user])->with('verify_status', 'verify-successful');
                } else {
                    return Redirect::route('verify')->with('verify_status', 'verify-failed');
                }
            } else {
                $e = ValidationException::withMessages(["file"=>session('connect_error_message')]);
                $e->redirectTo = '/verify';
                throw $e;
            }
        } else {
            $e = ValidationException::withMessages(["file"=>"File isn't signed or has been modified!"]);
            $e->redirectTo = '/verify';
            throw $e;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
