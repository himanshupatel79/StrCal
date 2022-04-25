<?php

namespace App;

use Exception;

class StrCal
{
    /**
     * The maximum number allowed.
     */
    const MAX_NUMBER_ALLOWED = 100;

    /**
     * The delimiter for the numbers.
     *
     * @var string
     */
    protected string $delimiter = ",|\n";

    /**
     * Add the provided set of numbers.
     *
     * @param  string  $numbers
     * @return int
     *
     * @throws \Exception
     */
    public function add(string $numbers)
    {
        $this->disallowNegatives($numbers = $this->parseString($numbers));

        return array_sum(
            $this->ignoreGreaterThan100($numbers)
        );
    }

    /**
     * Parse the numbers string.
     *
     * @param  string  $numbers
     * @return array
     */
    protected function parseString(string $numbers): array
    {
        $customDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

    /**
     * Do not allow any negative numbers. Negative number/s will throw an exception. 
     *
     * @param  array  $numbers
     * @throws Exception
     */
    protected function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negatives are not allowed. The negative that was passed is '.$number);
                
            }
        }
    }

    /**
     * Forget any number that is greater than 100.
     *
     * @param  array  $numbers
     * @return array
     */
    protected function ignoreGreaterThan100(array $numbers): array
    {
        return array_filter(
            $numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED
        );
    }
}