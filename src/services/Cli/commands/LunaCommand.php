<?php

namespace Luna\services\Cli\commands;


use Luna\Andromeda\Andromeda;
use Luna\services\Cli\{
    Auth, command, Progress, Printer, Table
};
use Luna\services\Console;

class LunaCommand extends Command
{
    private const version = 2.01;
    
    public function setup()
    {
        parent::setup();

        $this->setOption("version", "get the luna version","v","version");
        $this->setOption("serve", "launch a the built-in server[, takes an optional value for port]","s","serve");
        $this->setOption("test", "test part","t","test");
    }

    /**
     * @return \Luna\services\Cli\Color|string
     * @throws \Error
     */
    public  function help()
    {
        $p = new Printer();

        $s = NL . " " . $p->render(" welcome to Luna. ",["bg_white", "blue", "bold"]) . NL ;
        $s .= $this->getOptGuide();

        $s .= $p->render(NL . " Valid commands:",["blue", "bold"]);
        $t = new Table(["command", "description"]);
        $t->setChar("col", "");
        $t->setChar("line", "");

        foreach (Console::getCommands() as $command => $value)
        {
            $t->insert(["command" => $command, "description" => (isset($value['description']))? $value['description'] : ""]);
        }
        return $s . $t->render();
    }

    /**
     * @param null $args
     * @throws \Error
     * @throws \Exception
     */
    public  function __invoke($args = null)
    {
        if (empty($this->set_options) || $this->hasOpt("help"))
        {
            echo $this->help();
        }
        elseif ( $this->hasOpt("version") )
        {
            echo "v" . floatval(self::version);
        }
        elseif ( $this->hasOpt("serve") )
        {
            $p = new Printer();

            if( $this->hasOpt("serve") && intval( $this->opt("serve")) > 1024 )
                $port = $this->opt("serve");

            elseif( intval( $this->opt("serve")) <= 0 )
            {
                die("Error! wrong port number.");
            }
            else
                $port = "8000";

            echo $p->render(" Luna is listning on: ", ["blue", "bold"]) . $p->render("http://localhost:$port", "green") . NL;
            echo " Server started at: " . \date("D")  . " " . \date("M") . " " . \date("d") . " " . \date("Y") . " | " . \date("H:i:s") . NL;
            echo " Press Ctrl-C to quit." . NL;
            
            shell_exec("php -S localhost:$port -t public/");
        }
        elseif ( $this->hasOpt("test") ) 
        {
            $a = Andromeda::connect(["name" => "test"])->lock();
            //$a->create_table("test1");
            //$a->insert( ['id' => 8, "name" => "ali"])->inTo("test","test1")->exec();
            //$a->delete()->from("test","test1")->where("id","==",6)->exec();
            dump($a->select()->from("test1")->where("id","><",[6,8]));
        }
        else
        {
            echo "Ops! something wrong happened.";
        }
    }

    /**
     * @param $function
     * @param $args
     * @throws \Error
     */
    public  function __call($function, $args)
    {
        //(new Auth())->login();
    }
}