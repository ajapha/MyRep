<?php
 
  $obj = new account(1000);

  $obj->debit(100, 'Walmart');
  $obj->credit(200, 'cash deposit');
  $obj->debit(500, 'Target');
  $obj->debit(100, 'Sears');
  $obj->process();
//  print_r($obj);

  class account {
  
    public $starting_balance;
    public $current_balance;
    private $transactions = array(); 

    public function __construct($amount) {
      $this->starting_balance = $amount;
      $this->current_balance = $amount;
    }

    public function debit($amount, $source) {
   //   $this->current_balance = $this->starting_balance - $amount;
     $transaction = array();
     $transaction['type'] = 'debit';  
     $transaction['amount'] = $amount;   
     $transaction['source'] = $source;
     $this->transactions[] = $transaction; 
print_r($transaction);
//     $this->transactions[]['debit'] = $amount;   
//     $this->transactions[]['source'] = $amount;
    }

    public function credit($amount, $source) {
   //   $this->current_balance = $this->starting_balance + $amount;
        $transaction = array();
        $transaction['type'] = 'credit';  
        $transaction['amount'] = $amount;   
        $transaction['source'] = $source;
        $this->transactions[] = $transaction;


//         $this->transactions[]['credit'] = $amount; 
//         $this->transactions[]['source'] = $amount;
    }
   
     public function process() {
       echo 'Type  |    Source  |    Amount <br>';   
       foreach($this->transactions as $transaction) {
      
       echo $transaction['type'] . ' |  ' . $transaction['source'] . ' |  ' . $transaction['amount'] . '<br>';

        if($transaction['type'] == 'debit') {
        $this->current_balance = $this->current_balance - $transaction['amount'];
       } else {
          $this->current_balance = $this->current_balance + $transaction['amount'];
          }
       }
      }

/*      if($transaction['type'] == 'debit') {
        $this->current_balance = $this->current_balance - $transaction['amount'];
       } else() {
          $this->current_balance = $this->current_balance + $transaction['amount'];
          } 
*/

     public function __destruct() {
      echo '<br> Your starting balance was $' . $this->starting_balance . '.' . '<br>';
      echo 'Your current balance is $' . $this->current_balance . '.';

    }
  }

?>
