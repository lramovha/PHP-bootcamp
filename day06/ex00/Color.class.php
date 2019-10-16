<?php
class Color {
    static $verbose = false;
    public $red;
    public $green;
    public $blue;
    public function color_constructor(array $kwargs) {
        if (isset($kwargs['rgb'])) {
            $color = intval($kwargs['rgb'], 10);
            $this->red = $color / 65536;
            $this->green = $color % 65536 / 256;
            $this->blue = $color % 65536 % 256;
        } else if (
            isset($kwargs['red']) &&
            isset($kwargs['green']) &&
            isset($kwargs['blue'])) {
                $this->red = intval($kwargs['red'], 10);
                $this->green = intval($kwargs['green'], 10);
                $this->blue = intval($kwargs['blue'], 10);
        }
        if (self::$verbose) {
            printf($this . " created.\n");
        }
    }
    public function color_destroyer() {
        if (self::$verbose) {
            printf($this . " destroyed.\n");
        }
    }
    public function __tostring() {
        $sav = sprintf("Color( red: %3d, green: %3d, blue: %3d )",
                        $this->red, $this->green, $this->blue);
        return $sav;
    }
    static function doc() {
        if ($str = file_get_contents('Color.doc.txt')) {
            echo "$str";
        }
        else {
            echo "Error: .doc.txt file doesn't exist.\n";
        }
    }
    public function sub($col) {
        $new_color = new Color( array(
            'red' => $this->red - $col->red,
            'green' => $this->green - $col->green,
            'blue' => $this->blue - $col->blue,
        ) );
        return $new_color;
    }
    public function mult($factor) {
        $new_color = new Color( array(
            'red' => $this->red * $factor,
            'green' => $this->green * $factor,
            'blue' => $this->blue * $factor
        ) );
        return $new_color;
    }
    public function add($col) {
        $new_color = new Color( array(
            'red' => $this->red + $col->red,
            'green' => $this->green + $col->green,
            'blue' => $this->blue + $col->blue,
        ) );
        return $new_color;
    }
}
?>