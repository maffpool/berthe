<?php
define('ROOT_DIR', '/home/berthe_olivier/');

require ROOT_DIR . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 'on');


class Initializer {
    public static $container = null;

    public function __construct($config) {
        self::$container = new Berthe_DI_Container($config);

        $class = new CountryControllerTest();
        $class->setContainer(self::$container);
        $class->getAction();
    }
}


class AbstractController {
    protected $container = null;

    public function setContainer($container) {
        $this->container = $container;
        return $this;
    }

    public function __construct() {

    }
}


class CountryControllerTest extends AbstractController {
    public function getAction() {
        $serviceCountry = $this->container->get('CountryService');
        $serviceCountry->save();
    }
}

class Berthe_Service_Country {
    protected $manager = null;
    protected $arg1 = null;
    protected $arg2 = null;

    public function __construct($arg1, $arg2) {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }

    public function setManager($manager) {
        $this->manager = $manager;
        return $this;
    }

    public function save() {
        $rand = rand(0, 1000000);
        return $this->manager->save($rand);
    }
}

class Berthe_Modules_Country_Manager {
    public $storage = null;
    public function __construct() {

    }

    public function save($data) {
        return $this->storage->save($data);
    }
}

class Berthe_Store_Array {
    protected $data = array();

    public function save($data) {
        $this->data[] = $data;
        return true;
    }
}

class Berthe_Store_Echo {
    public function save($data) {
        echo "Berthe_Store_Echo : " . $data . "\n";
        return true;
    }
}


new Initializer(ROOT_DIR . '/test/config/container_test.yml');