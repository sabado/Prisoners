<?PHP namespace Rama\Veritasium;
use Codedungeon\PHPCliColors\Color;

Class Rooms{

    Public Static Function Create( int $size ):array {
        $fill_matrix = [];
        for($i = 1; $i <= $size; $i++ ) $fill_matrix[$i] = $i;
        $box_numbers = self::Shuffle( $fill_matrix );
        $prisioner_numbers = self::Shuffle( $fill_matrix );
        $room = [];
        foreach( $prisioner_numbers as $prisioner ){
             $room[array_pop($box_numbers)] = $prisioner;
        }
        
        return $room;
    }

    Public Static Function Shuffle( array $values ):array {
        $shuffled = [];
        $size = count($values);
        while( $values != [] ){
            $pick = rand(1,$size);
            if(isset($values[$pick])){
                $shuffled[] = $pick;
                unset($values[$pick]);
            }
        }
        return $shuffled;
    }

    Public Static Function Graph( array $Room ){
        $boxes = count($Room);
        $dimensions = sqrt($boxes);
        $dimensions  = ( $dimensions == (int)$dimensions ) ? $dimensions : (int)($dimensions) + 1;
        for( $y = 1; $y <= $dimensions; $y++ ){
            
            $split = Color::LIGHT_GRAY . ' | ' . Color::RESET;
            $arrow = Color::LIGHT_BLUE . ' → ' . Color::RESET;
            echo PHP_EOL, $split;
            for( $x = 1; $x <= $dimensions; $x++ ){
                if( $Room != [] ){
                    $KeyValue = array_slice($Room,0,1,true);
                    unset($Room[key($KeyValue)]);
                    echo Color::BOLD, str_pad( key($KeyValue), strlen( $boxes ), ' ',STR_PAD_BOTH ), Color::RESET, $arrow, Color::BOLD, str_pad( current($KeyValue), strlen( $boxes ), ' ',STR_PAD_BOTH ), Color::RESET;
                }else{
                    echo str_pad( '', strlen( $boxes ) * 2 + 3, ' ',STR_PAD_BOTH );
                }
                echo $split;
            }
            echo PHP_EOL;
            if( $Room == [] ) break;
            
        }
        echo PHP_EOL;
    }
}



