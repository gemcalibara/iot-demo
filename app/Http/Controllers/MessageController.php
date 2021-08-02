<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use App\Models\Device;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('customer_x_clients')
                    ->leftjoin('received_messages','received_messages.client_no','=','customer_x_clients.client_no')
                    ->leftjoin('topic_details', 'topic_details.topic_id','=','received_messages.topic_id')
                    ->select('customer_x_clients.device_name','topic_details.topic_name','received_messages.*')
                    ->orderByDesc('received_messages.msg_id')
                    ->take(50)
                    ->get();

        return response()->json($messages);
    }

    public function getStats()
    {
        $stats = Stat::get();

        return response()->json([   'topics'    => $stats[4]->seq, 
                                    'sent'      => $stats[7]->seq,
                                    'received'  => $stats[6]->seq
                                ]);
    }

}
