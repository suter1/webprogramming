<?php
interface ModelStructure {
    static function getTableName();

    static function getPrimaryKey();
}