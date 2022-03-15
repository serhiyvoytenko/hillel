<?php

class Color
{

    private int $red;
    private int $green;
    private int $blue;

    /**
     * @throws ErrorException
     */
    public function __construct(int $red = 0, int $green = 0, int $blue = 0)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @throws ErrorException
     */
    private function setRed(int $red): void
    {
        if ($red < 0 || $red > 255) {
            throw new ErrorException('Value is out of range');
        }
        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @throws ErrorException
     */
    private function setGreen(int $green): void
    {
        if ($green < 0 || $green > 255) {
            throw new ErrorException('Value is out of range');
        }
        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @throws ErrorException
     */
    private function setBlue(int $blue): void
    {
        if ($blue < 0 || $blue > 255) {
            throw new ErrorException('Value is out of range');
        }
        $this->blue = $blue;
    }

    public function equals(Color $color): bool
    {
        return $color->green === $this->green &&
            $color->blue === $this->blue &&
            $color->red === $this->red;
    }

    /**
     * @throws ErrorException
     * @throws Exception
     */
    public static function random(): Color
    {
        return new self(random_int(0, 255), random_int(0, 255), random_int(0, 255));
    }

    public function mix(Color $color): Color
    {
        $this->red = ($this->red + $color->red) / 2;
        $this->blue = ($this->blue + $color->blue) / 2;
        $this->green = ($this->green + $color->green) / 2;
        return $this;
    }
}
