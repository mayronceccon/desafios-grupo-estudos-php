<?php

namespace Test;

class AnoBissextoTest extends \PHPUnit\Framework\TestCase
{
    public function testAnoBissexto1()
    {
        $anoBissexto = new \MTC\AnoBissexto(2008);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto2()
    {
        $anoBissexto = new \MTC\AnoBissexto(1944);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto3()
    {
        $anoBissexto = new \MTC\AnoBissexto(1888);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto4()
    {
        $anoBissexto = new \MTC\AnoBissexto(1732);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto5()
    {
        $anoBissexto = new \MTC\AnoBissexto('1600');
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto6()
    {
        $anoBissexto = new \MTC\AnoBissexto(2016);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto7()
    {
        $anoBissexto = new \MTC\AnoBissexto(2000);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoBissexto8()
    {
        $anoBissexto = new \MTC\AnoBissexto(1996);
        $result = $anoBissexto->isBissexto();
        $this->assertTrue($result);
    }

    public function testAnoNaoBissexto1()
    {
        $anoBissexto = new \MTC\AnoBissexto("2011");
        $result = $anoBissexto->isBissexto();
        $this->assertFalse($result);
    }

    public function testAnoNaoBissexto2()
    {
        $anoBissexto = new \MTC\AnoBissexto(1951);
        $result = $anoBissexto->isBissexto();
        $this->assertFalse($result);
    }

    public function testAnoNaoBissexto3()
    {
        $anoBissexto = new \MTC\AnoBissexto(1889);
        $result = $anoBissexto->isBissexto();
        $this->assertFalse($result);
    }

    public function testAnoNaoBissexto4()
    {
        $anoBissexto = new \MTC\AnoBissexto(1742);
        $result = $anoBissexto->isBissexto();
        $this->assertFalse($result);
    }

    public function testAnoNaoBissexto5()
    {
        $anoBissexto = new \MTC\AnoBissexto(2015);
        $result = $anoBissexto->isBissexto();
        $this->assertFalse($result);
    }

    /**
     * @expectedException TypeError
     *
     * @return void
     */
    public function testParametroAnoIncorreto()
    {
        new \MTC\AnoBissexto("ANO");
    }
}
