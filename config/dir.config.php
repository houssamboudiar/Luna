<?php

namespace Luna\Config;

    // Define path constants

    define("DS", DIRECTORY_SEPARATOR);

    define("UP", DS . "..");

    define("URL", "http://127.0.0.1/new/");

    define("PUBLIC_URL", "http://127.0.0.1/new/public/");

    define("ROOT", getcwd() . UP . DS);

    define("APP_PATH", ROOT . 'app' . DS);

    define("CONFIG_PATH", ROOT . "config" . DS);

    define("SOURCE_PATH", ROOT . "src" . DS);

    define("PUBLIC_PATH", ROOT . "public" . DS);

    define("STORAGE_PATH", ROOT . "storage" . DS);



    define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);

    define("MODEL_PATH", APP_PATH . "models" . DS);

    define("VIEW_PATH", APP_PATH . "views" . DS);


    define("CORE_PATH", SOURCE_PATH . "core" . DS);

    define('DB_PATH', SOURCE_PATH . "database" . DS);

    define("LIB_PATH", SOURCE_PATH . "libraries" . DS);

    define("HELPER_PATH", SOURCE_PATH . "helpers" . DS);

    define("PROVIDERS_PATH", SOURCE_PATH . "providers" . DS);


    define("SESSION_PATH", STORAGE_PATH . "session" . DS);

    define("LOGS_PATH", STORAGE_PATH . "logs" . DS);


    define("HTML_PATH", PUBLIC_PATH . "html" . DS);

    define("CSS_PATH", PUBLIC_PATH .  "css/");

    define("JS_PATH", PUBLIC_PATH . "js" . DS);

    define("IMG_PATH", PUBLIC_PATH . "img" . DS);

    define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);


    define("HTML_URL", PUBLIC_URL . "html" . DS);

    define("CSS_URL", PUBLIC_URL .  "css/");

    define("JS_URL", PUBLIC_URL . "js" . DS);

    define("IMG_URL", PUBLIC_URL . "img" . DS);

    define("UPLOAD_URL", PUBLIC_URL . "uploads" . DS);





