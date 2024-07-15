<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class GeneralController extends Controller
{
    public function index($id)
    {
        try {
         
            if (view()->exists($id)) {
                return view($id);
            }
            else {
                return view('404');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    //show_file
    public function show_file($folder_name, $photo_name)
    {
        try {

            $show_file = Storage::disk('attachments')->getDriver()->getAdapter()->applyPathPrefix($folder_name.'/'.$photo_name);
            return response()->file($show_file);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    //download_file
    public function download_file($folder_name,$photo_name)
    {
        try {

            $download_file= Storage::disk('attachments')->getDriver()->getAdapter()->applyPathPrefix($folder_name.'/'.$photo_name);
            return response()->download( $download_file);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    //allNotifications
    public function allNotifications()
    {
        return view('dashboard.notification.index');
    }


    //markAllAsRead
    public function markAllAsRead(Request $request)
    {
        try {
            $userUnreadNotification= auth()->user()->unreadNotifications;
            if ($userUnreadNotification) {
                $userUnreadNotification->markAsRead();
                return back();
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
