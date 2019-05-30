<?php

namespace App\Helper;

class Sms
{
    private $phone,
            $message;

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function sendMessage()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.smsapi.pl/sms.do");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //1-nie wyswietla
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "access_token=n0X10NTzOmge5NeF5IZjU39Lf0Zd9w6oYSqM5eV6&to=".$this->phone."&message=".$this->message."&from=Info");
        $result = curl_exec($curl);
        curl_close($curl);

        // weryfikacja result
    }
}