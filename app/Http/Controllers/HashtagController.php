<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HashtagRequest;
use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use App\Models\Event;
class HashtagController extends Controller
{

    private $hashtag;
    private $event;
    public function __construct(Hashtag $hashtag, Event $event)
    {
        $this->hashtag = $hashtag;
        $this->event = $event;
    }
   
    public function postHashtag(HashtagRequest $request, $eventSlug)
    {
        $hashtag = $this->hashtag->newInstance();
        $event = $this->event->findBySlugOrFail($eventSlug);
        $hashtag->event_id = $event->id;
        $hashtag->fill($request->input());
        $hashtag->save();
        return redirect()->route('event.instastream',[$eventSlug]);
    }
}
