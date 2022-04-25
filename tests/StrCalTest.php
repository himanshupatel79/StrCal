<?php

use App\StrCal;
use PHPUnit\Framework\TestCase;

class StrCalTest extends TestCase
{
    /** @test */
    function it_evaluates_an_empty_string_as_0()
    {
        $calculator = new StrCal();

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    function it_finds_the_sum_of_a_single_number()
    {
        $calculator = new StrCal();

        $this->assertSame(1, $calculator->add('1'));
    }

    /** @test */
    function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StrCal();

        $this->assertSame(3, $calculator->add('1,2'));
    }

    /** @test */
    function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StrCal();

        $this->assertSame(22, $calculator->add('7,8,3,4'));
    }

    /** @test */
    function it_accepts_a_new_line_character_as_a_delimiter_too()
    {
        $calculator = new StrCal();

        $this->assertSame(14, $calculator->add("6\n8"));
    }

    /** @test */
    function it_accepts_a_pipe_character_as_a_delimiter_too()
    {
        $calculator = new StrCal();

        $this->assertSame(4, $calculator->add("1|2,3"));
    }

    /** @test */
    function negative_numbers_are_not_allowed()
    {
        $calculator = new StrCal();

        $this->expectException(\Exception::class);

        $calculator->add('3,-2');
    }

    /** @test */
    function it_supports_custom_delimiters()
    {
        $calculator = new StrCal();

        $this->assertEquals(18, $calculator->add("//:\n3:4:11"));
    }

    /** @test */
    function numbers_greater_than_100_are_ignored()
    {
        $calculator = new StrCal();

        $this->assertEquals(5, $calculator->add('5,101'));
    }
}
