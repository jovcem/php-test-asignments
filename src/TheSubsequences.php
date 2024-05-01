<?php

class TheSubsequences { 

    private function split($n) { 
        $stringified = str_split(strval($n));
        return $stringified;
    } 

    private function isContained($sequence, $number){
        $res_string = '';
        $number_index = 0;

        foreach ($sequence as $sequence_number) {
            for ($x = $number_index; $x < count($number); $x++) {
                if ($number[$x] == $sequence_number){ 
                    $number_index = $x;
                    $res_string .= strval($sequence_number);
                    break;
                }
            }
        }
 
        // compare the input and the subsequence as strings
        return implode($sequence) == ($res_string); 
    }
  
    public function count( $a,  $b,  $c) {  
        $c_parts = $this->split($c);

        $count = 0;
        for ($x = $a; $x <= $b; $x++) {
            $current_parts = $this->split($x);

            $contained = $this->isContained($c_parts, $current_parts);
            if($contained){
                $count +=1;
            }
        }
        return $count;
    }

}

