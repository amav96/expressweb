<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','','base_express_prueba');
        $db->query("SET NAMES 'utf8' ");
        return $db;
    }
}

    //  class Database{
    //    public static function connect(){
    //         $db = new mysqli('162.216.5.96','devuelvo_data','devuelvo2020','devuelvo_devoluciones');
    //         $db->query("SET NAMES 'utf8' ");
    //         return $db;
    //     }
    // }