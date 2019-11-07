<?php

namespace Math;

use PHPUnit_Framework_TestCase;
include("Parser.php");
include("Lexer.php");
include("Token.php");
include("Operator.php");
include("TranslationStrategyInterface.php");
include("ShuntingYard.php");

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function testCanCreateParser()
    {
        $this->assertInstanceOf('\Math\Parser', new Parser());
        
        try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase1 = '1 +a 2 * 3 * ( 7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase1);
    		if ($result == 302){
    			var_dump(" gaerror gan");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : a variable undefined");
        } 

        try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase2 = '1 + 2 * 3 * ( 7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase2);
    		if ($result == 302){
    			var_dump("success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error");
        } 
                try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase3 = '1-+2 * 3 * ( 7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase3);
    		if ($result == 302){
    			var_dump("success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : operators may not be in order");
        } 

          try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase4 = '1.,2 * 3 * ( 7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase4);
    		if ($result == 302){
    			var_dump(" success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : special characcter should not be used");
        }

             try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase5 = '';
    		$result = $parser->evaluate($testcase5);
    		if ($result == 302){
    			var_dump(" success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : equation null");
        }
        
            try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase6 = '1 + 2 * 3 *  7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase6);
    		if ($result == 302){
    			var_dump(" success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : unknown left bracket");
        }

            try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase7 = '1 + 2.aaa * 3 *  7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase7);
    		if ($result == 302){
    			var_dump(" success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : float format error");
        }

        try {
            //Masukin Test Case
            $parser = new \Math\Parser();
    		$testcase8 = '1 + 2. * 3 *  7 * 8 ) - ( 45 - 10 )';
    		$result = $parser->evaluate($testcase8);
    		if ($result == 302){
    			var_dump(" success");
    		}
        } catch (\InvalidArgumentException $e) {
        	var_dump("error : value after decimal is null");
        }
		
    }
}
