<?php 
require 'CandyCrush.php';

class CandyCrushTest {

    private function _test($testName, $inputArray, $candyStartPosition, $expected){
        echo "<h3>Test " . $testName . "</h3>";
        $c = new CandyCrush(); 

        $result = $c->howLong($inputArray, $candyStartPosition);

        if ( $result == $expected){
            echo '<div class="green">';
        }else{
            echo '<div class="red">';
        }
        echo '<span>'.implode(",",$inputArray).'</span>';
        echo ' , start position:' . $candyStartPosition;
        echo '<br>';
        echo $result . '=' . $expected;
        echo '</div>'  . '<br>'; 
    }


    public function test_all() {    
        $testCases = array(
            array(array(1, 2, 3, 4), 0, 4),                
            array(array(1, 2, 10, 4), 0, 10),              
            array(array(10, 1, 3, 4, 7), 2, 7),            
            array(array(10, 2, 3, 4, 7), 2, 10),          
            
            array(array(3, 3, 1, 3, 4, 4, 1, 3), 7, 3),    
            array(array(1, 2, 4, 3, 4, 3, 1, 3, 3, 4), 1, 4),   
            array(array(2, 1, 4, 4, 1, 1, 1, 1, 2, 1), 6, 1),  
            array(array(
                950,501,913,2,636,287,753,5,126,1,305,2,712,3,1,5,4,26,
                715,532,2,4,98,3,296,4,184,1,154,541,2,4,2,141,577,376,
                67,3,424,360,521,5,4,5,4,886,3,5,5,334), 28,541),

            array(array(2,4,2,4,803,1,996,855,682,3,2,5,1,5,225,3,4,5,49,189,3,328,5,494,863,390,2,1,810,4,
                    819,5,4,645,691,5,279,82,202,368,546,1,1,2,488,4,163,2,487,486), 12,225),

            array(array(288,1,256,327,723,432,674,196,218,90,6,563,643,431,351,948,546,282,705,805,864
                        ,229,99,499,865,986,218,961,434,12,338,255,91,797,406,519,242,329,578,220,912,866,702,412,456,430,702,688,397,222,792,153,155,784,957,413,401,167,76,586,429,306,124,498,136,
                        258,152,752,660,136,160,378,771,358,861,296,658,988,173,740,350,879,32,362,597,125,345,2,
                        193,420,417,51,808,195,169,50,703,505,327,579), 0, 288)  
        );

        // Execute test cases
        foreach ($testCases as $index => $testCase) {
            $this->_test(($index + 1), $testCase[0], $testCase[1], $testCase[2]);
        }
    }
}