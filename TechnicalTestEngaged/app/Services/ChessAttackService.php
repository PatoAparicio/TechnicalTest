<?php

namespace App\Services;

class ChessAttackService
{
     /**
     * @param int $n The size of the chessboard (n x n)
     * @param int $k The number of obstacles
     * @param int $rq The row coordinate of the queen
     * @param int $cq The column coordinate of the queen
     * @param array $obstacles An array of [row, column] that represent obstacle positions
     * @return int The total number of squares the queen can attack
     */
    public function calculate(int $n, int $k, int $rq, int $cq, array $obstacles): int
    {
        // All possible directions the queen can move.
        $directions = [
            [1, 0], [-1, 0], [0, 1], [0, -1], //Horiozntal/vertical
            [1, 1], [1, -1], [-1, 1], [-1, -1], //Diagonals
        ];
        //Create an array (map) for all obstacles
        $obstacleMap = [];
        foreach ($obstacles as $obs) {
            $obstacleMap[$obs[0] . '-' . $obs[1]] = true;
        }
        //Initialize the count of attackable squares
        $count = 0;
        //Iterate through each of the 8 directions
        foreach ($directions as [$dr, $dc]) {
            //Start checking from the square adjacent to the initial position of the queen
            $r = $rq + $dr;
            $c = $cq + $dc;
            //Moving in the direction to boundaries
            while ($r >= 1 && $r <= $n && $c >= 1 && $c <= $n) {
                //If it is an obstacle break out this direction
                if (isset($obstacleMap["$r-$c"]))
                break;
                //If it is not an obstacle count the square attackable
                $count++;
                //Move to the next square in the current direction
                $r += $dr;
                $c += $dc;
            }
        }
        //Return the total count of attackable squares
        return $count;
    }
}
