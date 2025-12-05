<?php

namespace Controllers;

use Model\Attendee;
use Model\Gift;

class ApiGifts {
    public static function index() {
        if(!is_auth()) {
            echo json_encode([]);
            return;
        }
        $gifts = Gift::all();
        foreach ($gifts as $gift) {
            $gift->total = Attendee::totalArray(['gift_id' => $gift->id, 'bundle_id' => "1"]);
        }
        echo json_encode($gifts);
        return;
    }
}