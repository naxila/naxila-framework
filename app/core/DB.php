<?php
class DB{
        private static $mysql;
        
        public static function connect() {
                $db = parse_ini_file("db.ini");
                self::$mysql = new mysqli($db['HOST'], $db['USER'], $db['PASSWORD'], $db['NAME']);
        }
        public static function query($query) {
                self::connect();
                self::$mysql->query($query);
        }
        public static function get($query) {
                self::connect();
                $result = self::$mysql->query($query);
                if(!$result) return false;
                $results = [];
                while($row = $result->fetch_assoc()) {
                        $results[] = $row;
                }
                return $results;
        }
        public static function getEntity($query) {
                self::connect();
                $result = self::$mysql->query($query);
                if(!$result) return false;
                return $result->fetch_assoc();
        }
        public static function getCell($query) {
                self::connect();
                return array_values(self::$mysql->query($query)->fetch_assoc())[0];
        }
}