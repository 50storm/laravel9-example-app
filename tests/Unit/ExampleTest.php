<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        
        $res = $this->formatPostCode('0312341234');
        dd($res);

        $this->assertTrue(true);
    }

    public function formatPostCode($input) {

        $input = str_replace("-", "", $input);
      
          //変数宣言
          $category = array(
                  "normal" => "/^0[^346]\d{8}$/",
                  "mobile" => "/^\d{11}$/",
                  "tokyo"  => "/^0[346]\d{7}$/",
                  "none"   => "/^\d{7}$/",
          );
          $pattern = array(
                  "normal" => "/(\d{3})(\d{3})(\d{4})/",
                  "mobile" => "/(\d{3})(\d{4})(\d{4})/",
                  "tokyo"  => "/(\d{2})(\d{3})(\d{4})/",
                  "none"   => "/(\d{3})(\d{4})/",
          );
          $rep = array(
                  "normal" => "$1-$2-$3",
                  "none"   => "$1-$2",
          );
      
          //携帯なら
          if(preg_match($category['mobile'],$input)) {
              $result = preg_replace($pattern['mobile'],$rep['normal'],$input);
          }
          //市外局番2桁なら
          elseif(preg_match($category['tokyo'],$input)) {
              $result = preg_replace($pattern['tokyo'],$rep['normal'],$input);
          }
          //普通の市外局番なら
          elseif(preg_match($category['normal'],$input)) {
              $result = preg_replace($pattern['normal'],$rep['normal'],$input);
          }
          //市外局番なしなら
          elseif(preg_match($category['none'],$input)) {
              $result = preg_replace($pattern['none'],$rep['none'],$input);
          }
          //その他なら
          else {
                  $result = $input;
          }
      
          return $result;
      }
}
