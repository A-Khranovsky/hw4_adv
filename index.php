<?php
class Color
{
    private int $red;
    private int $green;
    private int $blue;

    private function validate ($value): void
    {
        if ($value < 0 || $value > 255) {
            exit('Out of range');
        }
    }
    private function setRed(int $redValue):void
    {
        $this->validate($redValue);
        $this->red = $redValue;
    }
    private function setGreen(int $greenValue):void
    {
        $this->validate($greenValue < 0);
        $this->green = $greenValue;
    }
    private function setBlue(int $blueValue):void
    {
        $this->validate($blueValue);
        $this->blue = $blueValue;
    }

    public function getRed():int
    {
        return $this->red;
    }
    public function getGreen():int
    {
        return $this->green;
    }
    public function getBlue():int
    {
        return $this->blue;
    }

    public function __construct(int $_red, int $_green, int $_blue)
    {
        $this->setRed($_red);
        $this->setGreen($_green);
        $this->setBlue($_blue);
    }

    public function equals (Color $value) :bool {
        return (
            $this->red == $value->getRed()
            &&
            $this->green == $value->getGreen()
            &&
            $this->blue == $value->getBlue()
        );
    }

    public function mix(Color $valueColor): Color
    {
        return (new Color (
            intdiv($valueColor->getRed() + $this->getRed(),2),
            intdiv( $valueColor->getGreen() + $this->getGreen(),2),
            intdiv($valueColor->getBlue() + $this->getBlue(),2),
            )
        );
    }

    public static function random(): self
    {
        return new self(rand(0, 255), rand(0, 255), rand(0, 255));
    }

}

$color = new Color(200, 200, 200);
$mixedColor = $color->mix(new Color(100, 100, 100));
$mixedColor->getRed(); // 150
$mixedColor->getGreen(); // 150
$mixedColor->getBlue(); // 150

if (!$color->equals($mixedColor)) {
    echo 'Цвета не равні<br>';
}

$color = Color::random();
echo 'Згенеровано RGB: '.$color->getRed().' '.$color->getGreen().' '.$color->getBlue();