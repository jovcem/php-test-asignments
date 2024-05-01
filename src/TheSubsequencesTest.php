<?php
require 'TheSubsequences.php';

class TheSubsequencesTest { 

    private function _test($testName, $start, $end, $sequence, $expected){
        echo "<h3>Test " . $testName . "</h3>";
        $color = 'red';
        
        $s = new TheSubsequences();
        $count = $s->count($start, $end, $sequence);

        $test_result = ($count == $expected);

        if ($test_result){
            $color = 'green';
        }

        $input_string = 'Input:' . $start .", " . $end .", " . $sequence;
        $test_result_string = " Result: ". $count . "==" . $expected;
        echo '<div>'.$input_string.' <span class='.$color.'>'.$test_result_string.'</span></div>';
    }
 
    public function test_all() {   
 
        $testCases = array(
            array(26, 69, 3, 13),           
            array(11, 100, 4, 18),          
            array(77, 78, 4, 0),            
            array(13834, 26066, 1380, 14),  
            array(1, 1000000, 1, 468560),   
            array(25272, 31576, 757, 33),   
            array(23051, 27967, 62, 383),  
            array(6122, 30043, 8, 8674),   
            array(10, 999999, 46, 114265),  
            array(9, 6405, 95, 172),         
            array(100, 650, 65, 11)         
        ); 

        // Execute test cases
        foreach ($testCases as $index => $testCase) {
            $this->_test(($index + 1), $testCase[0], $testCase[1], $testCase[2], $testCase[3]);
        }

    }
}