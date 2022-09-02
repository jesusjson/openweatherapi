# PHP OPENWEATHER APİ

* Web sitelerinize kolaylıkla [OPENWEATHERAPİ](https://openweathermap.org/api) kurmak için yazmış olduğum bir framework.


## Kurulum

* İlk öncelikle [OPENWEATHERAPİ](https://openweathermap.org/api) adresinden api keyinizi alın.

* İkinci olarak classApi.php dosyasını sayafanıza include edin.

* Üçüncü olarak aşağıdaki gibi verilere erişebilirsiniz.

```php
$weather = new openWeather("İl","YourApiKey","Lang","Units");
$weather -> weather("Veri Numarası");
```
* Lang ve Units değerleri opsiyoneldir girmesenizde olur.

* Lang değeri:
    * [BURDAKİ](https://openweathermap.org/current#multi) adresten dil       optionlarına bakabilirsiniz.

* Units değeri:
    * [BURDAKİ](https://openweathermap.org/current#data) adresten ölçü optionlarına bakabilirsiniz.
    
* Veri numarası kısmına aşağıdaki sayıları yazarak istediğiniz verilere erişebilirsiniz.


### Numaralar

* 1 - Hava durumu [DETAYSIZ]
* 2 - Hava durumu [DETAYLI]
* 3 - Sıcaklık
* 4 - Hissedilen sıcaklık
* 5 - En düşük sıcaklık
* 6 - En yüksek sıcaklık
* 7 - Rüzgar hızı 
* 8 - Ülke
* 9 - İl


