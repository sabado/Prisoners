<?PHP namespace Sabado\Veritasium;
use Codedungeon\PHPCliColors\Color;

Class Prisoners{
    Public Static Function Go( int $PrisonerNumber, array $Room ){
        $box_number = $PrisonerNumber;
        $attempts = 1;
        while( true ){
            $box_number = $Room[$box_number];
            if( $box_number == $PrisonerNumber ) return $attempts;
            $attempts++;
        }
        // This is supposed don't happen.
        throw New \Exception( "This is supposed don't happen." );
    }
    Public Static Function Create( $PrisonersCount ){
        for( $i = 1; $i <= $PrisonersCount; $i++ ) $Prisoners[$i] = 0;
        return $Prisoners;
    }
    Public Static Function Graph( $Prisoners ){
        $PrisonerCount = count( $Prisoners );
        echo Color::BOLD, ' Prisoner # |  Attempts  |  Results  ', Color::RESET, PHP_EOL;
        foreach( $Prisoners as $Prisoner => $Attempts ){
            $Result = ($Attempts <= ($PrisonerCount /2) ) ? 'win' : 'loose' ;
            echo str_pad( '# ' . $Prisoner, 12, ' ', STR_PAD_BOTH ), '|'; 
            echo str_pad( $Attempts, 12,' ', STR_PAD_BOTH ), '|'; 
            echo ( $Result == 'win' ) ? Color::LIGHT_GREEN : Color::LIGHT_RED;
            echo str_pad( $Result, 12,' ', STR_PAD_BOTH );
            echo Color::RESET, PHP_EOL;
        }
    }
    Public Static Function Calculate( $Prisoners, $Max = false ){
        if( !$Max ) $Max = count( $Prisoners ) / 2 ;
        foreach( $Prisoners as $Prisoner => $Attempts ){
            if( $Attempts > $Max ) return false;
        }
        return true;
    }
}
