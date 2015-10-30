<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Vinkla\Instagram\Facades\Instagram;
use App\Models\Event;
class InstastreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($eventSlug)
    {
        $event = Event::findBySlugOrIdOrFail($eventSlug);
        return view('instastream.index')->with(compact('event'));
    }

}
