<?php

class GuessingGame
{
    public $maxGuesses;
    public $secretNumber;
    public $attempt = 0;

    // TODO: set a default amount of max guesses
    public function __construct(int $maxGuesses = 4)
    {
        // We ask for the max guesses when someone creates a game
        // Allowing your settings to be chosen like this, will bring a lot of flexibility
        $this->maxGuesses = $maxGuesses;
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function generateSecretNumber()
    {
        return rand(1, 10);
    }

    public function run()
    {
        if (empty($_SESSION['secretNumber'])) {
           // $this-> validation();
            $this->secretNumber = $this->generateSecretNumber();
            $_SESSION['secretNumber'] = $this->secretNumber;
        }

        //var_dump($_SESSION['secretNumber']);

        if (isset($_SESSION["attempt"])) {
            $_SESSION["attempt"]++;
        } else {
            $_SESSION["attempt"] = $this->attempt;
        }

        $this->attempt = $_SESSION["attempt"];
    }

    public function validation()
    {
        // Validation
        if (empty($_POST["guessingValue"])) {
            echo '<div class="alert alert-danger" role="alert">Please type a number from "1-10"</div>';
        } else {
            $guessingValue = $this->test_input($_POST["guessingValue"]);
            // check if e-mail address is well-formed
            if (!filter_var($guessingValue, FILTER_VALIDATE_INT)) {
                echo '<div class="alert alert-danger" role="alert">You have typed an invalid data</div>';
            }
            if ($_POST["guessingValue"] > 10 || $_POST["guessingValue"] <= 0) {
                echo '<div class="alert alert-danger" role="alert">This field accept only number from "1-10"</div>';
            }
        }
    }

    public function result()
    {
        if (!isset($_POST['guessingValue'])) {
            $_POST['guessingValue'] = 0;
        }

        if ($_SESSION['secretNumber'] == $_POST['guessingValue']) {
            $this->playerWins();
            $this->reset();
        }
        if ($this->attempt >= $this->maxGuesses) {
            $this->playerLoses();
            $this->reset();
        }
    }

    public function playerWins()
    {
        // TODO: show a winner message (mention how many tries were needed)
        echo "Congratulation! You won. The secret number was: " . $_SESSION['secretNumber'];
    }

    public function playerLoses()
    {
        // TODO: show a lost message (mention the secret number)
        echo "Sorry you guessed wrong. The secret number was: " . $_SESSION['secretNumber'];
    }

    public function reset()
    {
        // TODO: Generate a new secret number and overwrite the previous one
        return session_destroy();
    }
    public function btnName()
    {
        if ($this->attempt >= $this->maxGuesses || $_SESSION['secretNumber'] == $_POST['guessingValue']) {
            echo "Restart";
        } else {
            echo "Guess";
        }
    }
}
