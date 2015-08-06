<?php
namespace DP\GOF\Structural\Proxy;

/**
 * Interface Image
 */
interface Image
{
    /**
     * @return mixed
     */
    public function displayImage();
}

/**
 * Class RealImage
 */
class RealImage implements Image
{
    /**
     * @var null
     */
    private $fileName = null;

    /**
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->loadImageFromDisk();
    }

    /**
     *
     */
    public function displayImage()
    {
        echo "Displaying..." . $this->fileName . PHP_EOL;
    }

    /**
     *
     */
    private function loadImageFromDisk()
    {
        echo "Loadin......." . $this->fileName . PHP_EOL;
    }
}

/**
 * Class ProxyImage
 */
class ProxyImage implements Image
{
    /**
     * @var RealImage
     */
    private $realImage;
    private $fileName;

    /**
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function displayImage()
    {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->fileName);
        }

        $this->realImage->displayImage();
    }
}

$image1 = new ProxyImage("my_awsome_photo_1.jpg");
$image2 = new ProxyImage("my_awsome_photo_2.jpg");

$image1->displayImage(); // loading necessary
$image1->displayImage(); // loading unnecessary
$image2->displayImage(); // loading necessary
$image2->displayImage(); // loading unnecessary
$image1->displayImage(); // loading unnecessary
