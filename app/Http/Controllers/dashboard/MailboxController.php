<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\helper\Message;
use App\helper\Helper;
use App\Mailbox;
use App\Option;
use DB;
use DataTables;

class MailboxController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("dashboard.mailbox.index");
    }

    /**
     * return json data of inbox
     */
    public function getData1() {
        return DataTables::eloquent(Mailbox::query()->where("favourite", '0'))
                        ->addColumn('action', function(Mailbox $mailbox) {
                            return view("dashboard.mailbox.action", compact("mailbox"));
                        })
                        ->editColumn('date', function(Mailbox $mailbox) {
                            return $mailbox->getTime();
                        })
                        ->rawColumns(['action'])
                        ->toJson();
    }

    /**
     * return json data of sent
     */
    public function getData2() {
        return DataTables::eloquent(Mailbox::query()->where("favourite", '1'))
                        ->addColumn('action', function(Mailbox $mailbox) {
                            return view("dashboard.mailbox.action", compact("mailbox"));
                        })
                        ->editColumn('date', function(Mailbox $mailbox) {
                            return $mailbox->getTime();
                        })
                        ->rawColumns(['action'])
                        ->toJson();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $mail = new Mailbox;
            $mail->email = $request->email;
            $mail->title = $request->title;
            $mail->message = $request->message;
            $mail->date = date("Y-m-d");

            $mail->save();

            $this->sendMessage($request);

            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request) {
        try {
            $to = $request->email;
            $subject = $request->title;

            $message = $request->message;
            $from = Option::find(1)->value;

            $header = "From:$from \r\n";
            $header .= "Cc:$from \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            Helper::sendMail($to, $message, $subject);
            
            $retval = mail($to, $subject, $message, $header);

            return $retval;
        } catch (\Exception $exc) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailbox $mailbox) {
        try {
            $mailbox->delete();
            return Message::success(Message::$DONE);
        } catch (\Exception $ex) {
            return Message::error(Message::$ERROR);
        }
    }

}
