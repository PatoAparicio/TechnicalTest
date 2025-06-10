<?php

namespace App\Services;

class StringValueService
{   /*
     * @param string $t The input string
     * @return int The calculated maximum string value
     */
    public function maxStringValue($t)
    {
        $length= strlen($t);//length of the input string
        $maxValue = 0; // Initialize the maximum value
        $suffixes = [];// Array to store all suffixes of the input string

        // Generate all suffixes of the input string.
        for ($i = 0; $i < $length; $i++) {
            $suffixes[] = substr($t, $i);
        }

        // Sort the suffixes alphabetically
        sort($suffixes);

        // Calculate the maximum value by iterating through sorted suffixes and their prefixes
        for ($i = 0; $i < $length; $i++) {
            $current = $suffixes[$i];// Get the current string from the sorted list.
            $len = strlen($current);// Get the length of current string

            // Iterate through all possible prefix lengths of the current string
            for ($l = 1; $l <= $len; $l++) {
                // Extract the substring of the current string
                $substring = substr($current, 0, $l);
                // Initialize count for the current substring
                $count = 1;

                //Count occurrences of this substring
                $j = $i + 1;
                while ($j < $length && strpos($suffixes[$j], $substring) === 0) {
                    $count++;
                    $j++;
                }
                // Calculate the value for this substring: (length * count).
                $value = $l * $count;
                // Update the overall maximum value if the current value is greater
                if ($value > $maxValue) {
                    $maxValue = $value;
                }
            }
        }
        // Return the final maximum string value
        return $maxValue;
    }
}
