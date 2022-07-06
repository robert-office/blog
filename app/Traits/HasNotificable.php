<?php

namespace App\Traits;

trait HasNotificable {

    public function HandleNotification ( string|null $type = "success", string $message ) : Void {
        session()->put($type, $message);
    }
}
