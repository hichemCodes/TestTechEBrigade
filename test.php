<?php
   
/**
 *  Mohemed Hichem LAOUAR
 *  Test Téchnique eBrigade Technologies
*/


/**
*  Tableau des banknotes
*/
$banckNotes = [0.1,0.2,0.5, 1, 2, 5, 10, 20, 50];

 
/**
 *  Tableau des résultats
 *  Au début chaque possède une valeur de 0
 */
$result = [
    "0.1"  => 0,
    "0.2" => 0,
    "0.5" => 0,
    "1"  => 0,
    "2" => 0,
    "5" => 0,
    "10"  => 0,
    "20" => 0,
    "50" => 0
];

/**
 *  calcule la banknotes à choisir en basant sur le tabeau du banknotes et le montant actuelle amount
 *  Le role de cette fonction est de boucler sur les banknotes pour trouver le banknote idéale pour un monatant donné
 *  Ex : pour un monant de 0.6, la fonction va trouver le dérnier banknote < 0.6 qui est 0.5
 */
function bestChoice($array,$amount) {

    $lastElement = 0;
    $j=0;

    foreach($array as $element ) { 
                    
        if($amount > $element || $amount."" == $element."") {
            $j = $j+1;
        }  else {
            $currentIndex = $j-1;
            $lastElement = $array[$currentIndex];  
        }
                    
    }
    
    return  $lastElement;     
}

/**
 * cette fonction à pour but de gérér le montant (amount) et modifier le tableau result pour obtenir la soulition du problème 
 * Tant que le montant est > le min du banknotes qui est 0.1, cette fonction appelle bestChoice pour choisir banknote idéale pour un monatant actuell
 * elle retire le banknote retourné par bestChoice au montant actuelle pour obtenir un nouvau monant à chaque tour de boucle
 * Ex : si le montant est par exemple 50.2 
 *      bestchoice(50.2,data) = 50  le montant devient 50.2 - 50 = 50  => 1 banknotes de 50
 *      bestchoice(0.2,data) = 0.2  le montant devient 0.2 - 0.2 = 0  => 1 banknotes de 0.2
 *    fin du boucle
 */
function getBankNoteResult($amount,$data,$finalArray) {
    
    while($amount > min($data) || $amount."" == min($data)."" ) {
            
        if($amount >= max($data)) {
            $amount-= max($data);
            $finalArray[max($data).''] = $finalArray[max($data).''] + 1;
        } else {
            
            $bestChoice = bestChoice($data,$amount);
            $finalArray[$bestChoice.''] = $finalArray[$bestChoice.''] + 1;

            switch($bestChoice) {
                case 0.1: $amount -=0.1;
                          break;
                case 0.2: $amount -=0.2;
                          break;
                case 0.5: $amount -=0.5;
                          break;
                case 1: $amount -=1;
                        break;
                case 2: $amount -=2;
                        break;
                case 5: $amount -=5;
                        break;
                case 10: $amount -=10;
                         break;
                case 20: $amount -=20;
                         break;
                case 50: $amount -=50;
                         break;
                default: $amount-=0.1; 
            }
        }        
    }
    return $finalArray;
}


/**
 * une fonction qui affiche le résultat final à parit du tabeau qui contient les valeurs de chaque bancknote aprés la résoulition du problème
 */
function printResult($array) {
    
    $output = "you need : \n";

    foreach ($array as $key => $value) {
        if($value > 0) {
            $output.=" ".$value." banknotes of ".$key. "\n";
        }
    }
    echo $output;
}

//afficher le résultat
printResult(getBankNoteResult(178.80,$banckNotes,$result));

?>
    
