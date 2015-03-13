<?php

// Create array to hold list of todo items
$items = [];
// $items = array('0','1');
// array_unshift($items,"");
// unset($items[0]);
// The loop!
do {

    // Iterate through list items
    foreach ($items as $key => $item) {
      $key++;
        // Display each item and a newline
        echo "[{$key}] {$item}\n";
    }

    // Show the menu options
    echo '(N)ew item, (R)emove item, (U)ppercase, (L)owercase, (S)ort, (Q)uit: ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = trim(fgets(STDIN));

    // Check for actionable input
    switch ($input) {
      case 'N':
      // Ask for entry
      echo 'Enter item: ';
        //gets value of entry
        $inputed = trim(fgets(STDIN));
          //asks user if they want entry at beginning or end of array
          echo "Would you like to add to the beginning or end of list?\nType (B)eginning/(E)nd: ";
          //answer of if beginning or end
          $answer = trim(fgets(STDIN));
            // Add entry to list array
            if ($answer == 'B') {
              array_unshift($items,$inputed);
            }else if($answer == 'E') {
              array_push($items,$inputed);
            }else{
              echo "\nERROR:You did not give a valid input\n";
            }
        break;

      case 'R':
      // Remove which item?
      echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
          // Remove from array
          unset($items[--$key]);
      break;

      case 'U':
      // ask if user wants uppercase values
      echo "Would you like to make the values uppercase?\nType Y/N: ";
        //ask user to answer Y/N
        $answer = trim(fgets(STDIN));
          if ($answer == 'Y') {
            $items = array_map('strtoupper',$items);
          }elseif ($answer == 'N') {
            null;
          }else{
            echo "\nERROR:You did not give a valid input\n";
          }
      break;

      case 'L':
      // ask if user wants lower case values
      echo "Would you like to make the values lowercase?\nType Y/N: ";
        //ask user to answer Y/N
        $answer = trim(fgets(STDIN));
          //if Y do the the following
          if ($answer == 'Y') {
            $items = array_map('strtolwer',$items);
          }
          // if 'N' do the following
          elseif ($answer == 'N') {
            null;
          }else{
            echo "\nERROR:You did not give a valid input\n";
          }
      break;

      case 'S':
      //sort options
      echo '(A)-Z, (Z)-A, (O)rder entered, (Re)verse order entered: ';
        $selectSort = trim(fgets(STDIN));
        //switch statement for sort options key's
          switch ($selectSort) {
              case 'A':
              //ask's if user wants to order from A-Z
              echo "Would you like to order the items in alphabetical order from A-Z?\nType Y/N: ";
                //ask user to answer Y/N
                $answer = trim(fgets(STDIN));
                  //if Y do the the following
                  if ($answer == 'Y') {
                    asort($items);
                  }
                  //if 'N' do the following
                  else if($answer == 'N'){
                    null;
                  }else{
                    echo "\nERROR:You did not give a valid input\n";
                  }
                  break;

              case 'Z':
              //ask's if user wants to order from Z-A
              echo "Would you like to order the items in alphabetical order from Z-A?\nType Y/N: ";
                //ask user to answer Y/N
                $answer = trim(fgets(STDIN));
                //if 'Y' do the the following
                if ($answer == 'Y') {
                  arsort($items);
                }
                //if 'N' do the following
                else if($answer == 'N'){
                  null;
                }else{
                  echo "\nERROR:You did not give a valid input\n";
                }
                break;

              case 'O':
              //ask's if user wants to order based on key value from low to high
              echo "Would you like to order item number's from low to high?\nType Y/N: ";
                //ask user to answer Y/N
                $answer = trim(fgets(STDIN));
                //if 'Y' do the the following
                if ($answer == 'Y') {
                  ksort($items);
                }
                //if 'N' do the following
                else if($answer == 'N'){
                  null;
                }else{
                  echo "\nERROR:You did not give a valid input\n";
                }
                break;

              case 'Re':
              //ask's if user wants to order based on key value from high to low
              echo "Would you like to order item number's from high to low?\nType Y/N: ";
                //ask user to answer Y/N
                $answer = trim(fgets(STDIN));
                  //if 'Y' do the the following
                  if ($answer == 'Y') {
                    krsort($items);
                  }
                  //if 'N' do the following
                  else if($answer == 'N'){
                    null;
                  }else{
                    echo "\nERROR:You did not give a valid input\n";
                  }
                  break;
                }

    }
// Exit when input is (Q)uit
} while ($input != 'Q');


// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
?>
