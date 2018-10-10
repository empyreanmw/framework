<?php
namespace App\Traits;

use App\contracts\ObserverInterface;
use App\Exceptions\ObserverContractException;

trait Observerable
{
    protected $observers = [];

    public function attach($observers)
    {
        if (!is_array($observers)) {
            array_push($this->observers, $observers);
        }
        else{
            $this->observers = $observers;
        }
    }

    public function fire($observers)
    {
        $this->attach($observers);

        $this->observerHandler();
    }

    protected function observerHandler()
    {
        foreach ($this->observers as $observer) {
            if (!$this->followsContract($observer)) {
                throw new ObserverContractException();
            }

            $observer->handle();
        }
    }

    protected function followsContract($observer)
    {
       return $observer instanceof ObserverInterface;
    }
}
