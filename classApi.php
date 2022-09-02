<?php 
class openWeather{
    public $key;
    public $city;
    public $lang;
    public $units;
    public $data;
    

    public function __construct($Jcity,$Jkey,$Jlang = "tr",$Junits = "metric")
    {
        $this -> key = $Jkey;
        $this -> city = $Jcity;
        $this -> lang = $Jlang;
        $this -> units = $Junits;
        
    }
    
    public function weather($apiSec = null){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.openweathermap.org/geo/1.0/direct?q=$this->city&limit=1&appid=$this->key",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $x = curl_exec($curl);
        curl_close($curl);
        
        $Jdata = json_decode($x, FALSE);
        $Jlat = $Jdata[0] -> lat;
        $Jlon = $Jdata[0] -> lon;

        
        /******** */
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?lat=$Jlat&lon=$Jlon&appid=$this->key&units=$this->units&lang=$this->lang",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $x = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($x, FALSE);
        
        $hava = $data -> weather[0] -> main; /**Hava durumu */
        $havaDurum = $data -> weather[0] -> description; /**Hava durumu */
        $sıckalık = $data -> main -> temp; /** Sıcaklık */
        $hissedilenSıc = $data -> main -> feels_like; /** Hissedilen Sıcaklık */
        $enDusukSıc = $data -> main -> temp_min; /** En düşük */
        $enYuksekSıc = $data -> main -> temp_max; /** En Yüksek */
        $ruzgarHız = $data -> wind -> speed; /** Rüzgar hızı */
        $ulke = $data -> sys -> country; /** Ülke */
        $il = $data -> name; /** İl */

        switch ($apiSec) {
            case 1:
                print_r($hava);
                break;
            case 2:
                print_r($havaDurum);
                break;
            case 3;
                print_r($sıckalık);
                break;
            case 4;
                print_r($hissedilenSıc);
                break;
            case 5;
                print_r($enDusukSıc);
                break;
            case 6;
                print_r($enYuksekSıc);
                break;
            case 7;
                print_r($ruzgarHız);
                break;
            case 8;
                print_r($ulke);
                break;
            case 9;
                print_r($il);
                break;

            default:
                echo "[OPENWEATHER API] Geçersiz sayı değeri veya <string> değer!";
                break;
        }

    }
}

$weather = new openWeather("istanbul","9f3e84818b28f84d9e3f9769b1075ae3");
echo $weather -> weather(2);



?>