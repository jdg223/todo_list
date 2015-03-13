

<?php

// Create array to hold list of todo items
$items = array('0','1');
array_unshift($items,"");
unset($items[0]);
// The loop!
do {

    // Iterate through list items
    foreach ($items as $key => $item) {

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
      // Add entry to list array
      $items[] = trim(fgets(STDIN));
      break;

      case 'R':
      // Remove which item?
      echo 'Enter item number to remove: ';
      // Get array key
      $key = trim(fgets(STDIN));
      // Remove from array
      unset($items[$key]);
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
      }
      break;

      case 'S':
      sorter($input);
      break;

    }
// Exit when input is (Q)uit
} while ($input != 'Q');


function sorter($input){
  foreach ($items as $key => $item) {

  echo '(A)-Z, (Z)-A, (O)rder entered, (Re)verse order entered: ';
  $input = trim(fgets(STDIN));
switch ($input) {
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
    }
    break;
    }
  }
}
// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);
?>
<!-- Most of this code should be very familiar by now, but we have introduced a few
new items.

trim() removed whitespace and special characters from strings. See the PHP man
page for trim().

We used a do/while instead of another control structure. This allowed us to
enter our loop, and pause at the user input area until the user decides to (Q)uit.

We used unset() to remove array elements. See the PHP man page for unset().

Exercises

Create a new directory in your vagrant-lamp directory named todo_list with a
file named todo.php containing the code above. Use git init to initialize a new
local repository in that directory and commit your code. Create a new remote
repository on GitHub called CLI_Todo_List and add the remote to your local
repository so you can push your code.

After each exercise item, commit and push changes to your GitHub repository.

Update the code to allow upper and lowercase inputs from user for all menu items.
Test adding, removing, and quitting.

Update the program to start numbering the list with 1 instead of 0. Make sure
remove still works as expected. -->
