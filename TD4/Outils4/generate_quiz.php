<html>
    <body>

        <?php
        session_start();
        require_once 'Outils4/utils.php';
        require_once 'Outils4/printForms.php';
        require_once 'Outils4/bdd4.php';

        if (!isset($dbh)) {
            $dbh = Database::connect();
        }
        
        $number_of_hands = $_POST["number_of_hands"];
        $name = $_POST["quiz_name"];
        
        $quiz = new Quiz();
       
        quiz::createQuiz($dbh, $name, $number_of_hands);

        
        //!!! We need quiz number !!! How can we get it? probably make $quiz_id = SELECT ... in createQuiz///
        
        $suits = [0 => "c", 1 => "d", 2 => "h", 3 => "s"];
        $values = [1 => "2", 2 => "3", 3 => "4", 4 => "5", 5 => "6", 6 => "7", 7 => "8", 8 => "9",
            9 => "10", 10 => "J", 11 => "Q", 12 => "K", 13 => "A"];

        for ($i = 1; $i <= $number_of_hands; $i++) {

            foreach ($suits as $suit_number => $suit) {
                foreach ($values as $rang => $value) {
                    if (isset($_POST[$value . $suit])) {
                        
                    }
                }
            }
        }
        ?>


        Min &spades; is <?php echo $_POST["min_spades"]; ?><br>
        Max &spades; is: <?php echo $_POST["max_spades"]; ?><br>
        <?php
        if (isset($_POST["2h"])) {
            echo "User chose 2s " . $_POST["inlineCheckbox2h"];
        } else {
            echo "User didn't choose 2h";
        }
        ?>

    </body>
</html>