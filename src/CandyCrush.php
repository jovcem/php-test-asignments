<?php 

class CandyCrush { 

    private function debug(){
        return true;
    }

    private function bestPositionLeft($side, $candyPositionIndex, $times){
        $bestPositionIndex = $candyPositionIndex;
        foreach ($side as $index => $crushTime) {
            $positionOk = true;
            for ($x=$candyPositionIndex-1; $x >= $index; $x--) { 
                $stepsRequired = $candyPositionIndex - $x;
                $crushTime = $times[$x];
                if ( $crushTime - $stepsRequired < 1){
                    $positionOk = false;
                    break;
                }
            }
            if ($positionOk){
                $bestPositionIndex = $index;
                break;
            }
        }
        return $bestPositionIndex;
    }

    private function bestPositionRight($side, $candyPositionIndex, $times){
        $bestPositionIndex = $candyPositionIndex;
        foreach ($side as $index => $crushTime) {
            $positionOk = true;
            for ($x=$candyPositionIndex+1; $x <= $index; $x++) { 
                $stepsRequired =  $x - $candyPositionIndex;
                $crushTime = $times[$x];

                if ( $crushTime - $stepsRequired < 1){
                    $positionOk = false; 
                    break;
                }
            }
            if ($positionOk){
                $bestPositionIndex = $index;
                break;
            } 
        }
        return $bestPositionIndex;
    }

    private function findBestPosition(
        $candyPositionIndex, 
        $times
    ){
        $leftSide = [];
        $rightSide = [];
        // key is index, value is time to crash

        // split candy positions as left and right sides
        for ($x=0; $x < count($times); $x++) {  
            if ($x > $candyPositionIndex){
                $rightSide[$x] = $times[$x] ;
            }
            if ($x < $candyPositionIndex){
                $leftSide[$x] = $times[$x] ;
            }
        }

        // sort both sides by highest crush time
        arsort($leftSide);
        arsort($rightSide);
 
        $bestPositionIndex = $candyPositionIndex;

        // find best position on left side
        $bestPositionIndexLeft = $this->bestPositionLeft(
            $leftSide, 
            $candyPositionIndex,
            $times
        );
        // find best position on right side
        $bestPositionIndexRight = $this->bestPositionRight(
            $rightSide, 
            $candyPositionIndex,
            $times
        );

        // find bestest position of all time
        $bestFinalPosition = $bestPositionIndexLeft;
        if ($times[$bestPositionIndexRight] > $times[ $bestPositionIndexLeft]){
            $bestFinalPosition = $bestPositionIndexRight;
        } 

        echo "Best position index left:";
        echo $bestPositionIndexLeft . ", " . $times[$bestPositionIndexLeft];
        echo "<br>";
        echo "Best position index right:";
        echo $bestPositionIndexRight  . ", " . $times[$bestPositionIndexRight];
        echo "<br>";
        echo "Highest crush time:";
        echo $times[$bestFinalPosition];
        echo "<br><br>";

        return $bestFinalPosition;
    }

    private function moveCandy(
        $currentPosition, 
        $times,
        $bestPositionIndex
    ){
        if ( $currentPosition == $bestPositionIndex){
            return $currentPosition;
        }

        $newIndex = $currentPosition;

        // calc next move direction 
        if ($bestPositionIndex > $currentPosition){
            $newIndex = $currentPosition + 1;
        }else{
            $newIndex = $currentPosition - 1;
        }

        return $newIndex;
    }

    private function crushArray($times){
        $res = [];

        foreach ($times as $time) {
            array_push($res, $time - 1);
        }  

        return $res ;
    }

    private function prettyPrintArray($times, $candyPos){
        echo '<div>';

        for ($x=0; $x < count($times); $x++) {  
            if ($x == $candyPos){
                echo '<span class="highlight">[🍬]</span>'; 
            }else{
                if ($times[$x] < 0){
                    echo '[x]';  
                } else {
                    echo '['.$times[$x].']';  
                }
            }
        }   
        echo '</div><br>';
    }

    private function debugPrint($txt, $current_times, $currentPos){
        if (!$this->debug()){
            return;
        }
        echo $txt;
        $this->prettyPrintArray($current_times, $currentPos);
    }

    public function howLong($times, $startPos){ 
        echo '<div  class="wrap">';
        echo '<button onclick="togglediv(this)" >Show/Hide Visualized</button>';
        echo '<div  class="content" style="display:none">';
        $bestPositionIndex = $this->findBestPosition($startPos, $times);
        
        $maxTurns = max($times);
        $turnsMade = 0;

        $candyPosition = $startPos;
        $current_times = $times;
 
        $this->debugPrint(
            ('Start state: Candy Position:' . $candyPosition  . '<br>'),
            $current_times, $candyPosition
        );

        for ($turn=1; $turn <= $maxTurns; $turn++) { 
            $candyPosition = $this->moveCandy($candyPosition, $times, $bestPositionIndex);
            $current_times = $this->crushArray($current_times);

            if ($current_times[$candyPosition] < 0){
                break;
            }

            $this->debugPrint(
                ('Turn:' . $turn . ', Candy Position:' . $candyPosition  . '<br>'),
                $current_times, $candyPosition
            );

            $turnsMade+=1;
        }
        
        if ($this->debug()){
            echo '<br>Turns Made:';
            echo $turnsMade;
            echo '<br>';
        } 
        echo '</div>';
        echo '</div>';
        return $turnsMade; 
    }

}