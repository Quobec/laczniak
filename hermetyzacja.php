<?php

class Samochod {
    private $vin;
    private $czy_bity;
    protected $v_max;

    public $model;
    public $marka;
    public $predkosc;

    public function __construct($model, $marka, $predkosc) {
        $this->v_max = 200;
        $this->model = $model;
        $this->marka = $marka;
        $this->predkosc = $predkosc;
    }

    public function odczytajVIN() {
        return $this->vin;
    }

    public function zapiszVIN($vin) {
        $this->vin = $vin;
    }

    public function zwiekszPredkosc($liczba) {
        if ($this->predkosc + $liczba <= $this->v_max) {
            $this->predkosc += $liczba;
        }
    }
}

class Osobowy extends Samochod {
    public $ile_osob;
    private $wlasciciel;

    public function __construct($model, $marka, $predkosc, $ile_osob, $wlasciciel) {
        parent::__construct($model, $marka, $predkosc);
        $this->ile_osob = $ile_osob;
        $this->wlasciciel = $wlasciciel;
    }

    public function getWlasciciel(){
        return $this->wlasciciel;
    }
}

class Ciezarowy extends Samochod {
    public $ladownosc;

    public function __construct($ladownosc) {
        parent::__construct("F400", "Scania", 120);
        $this->ladownosc = $ladownosc;
    }
}

$ciezarowy = new Ciezarowy(5000);

echo "Dane ciężarowego: <br>";
echo "Marka: " . $ciezarowy->marka . "<br>";
echo "Model: " . $ciezarowy->model . "<br>";
echo "Prędkość: " . $ciezarowy->predkosc . "<br>";
echo "Ladowność: " . $ciezarowy->ladownosc . "<br><br>";

if (isset($_POST['model'])) {
    $model = $_POST["model"];
    $marka = $_POST["marka"];
    $predkosc = $_POST["predkosc"];
    $vin = $_POST["vin"];

    $osobowy1 = new Osobowy($model, $marka, $predkosc, 5, "Jan Kowalski");
    $osobowy1->zapiszVIN($vin);

    echo "Dane osobowego z formularza: <br>";
    echo "Marka: "      . $osobowy1->marka           . "<br>";
    echo "Model: "      . $osobowy1->model           . "<br>";
    echo "Prędkość: "   . $osobowy1->predkosc        . "<br>";
    echo "Ilość osób: " . $osobowy1->ile_osob        . "<br>";
    echo "Właściciel: " . $osobowy1->getWlasciciel() . "<br>";
    echo "VIN: "        . $osobowy1->odczytajVIN()   . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form method="POST" action="hermetyzacja.php">
        Model: <input type="text" name="model"><br>
        Marka: <input type="text" name="marka"><br>
        Prędkość: <input type="text" name="predkosc"><br>
        VIN: <input type="text" name="vin"><br>
        <input type="submit" value="Wyślij">
    </form>
</body>
</html>
