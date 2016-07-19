<?php

require_once('connection.php');
require_once('types.php');

class TypeManager{

    // public $aTypes =[];

    static public function getTypes(){

        $aTypes =[];

        $oConnection = new Connection();

        $sSQL = 'SELECT id FROM types';

        $oResultSet = $oConnection->query($sSQL);

        while($aRow = $oConnection->fetch($oResultSet)){
            $iTypeId = $aRow['id'];
            $oType = new Type();

            $oType->load($iTypeId);
            $aTypes[] = $oType;
        }
        return $aTypes;
    }


    static public function listImages(){

        $aImages = [];

        $oConnection = new Connection;

        $sSQL = 'SELECT * FROM images';

        $oResultSet = $oConnection->query($sSQL);

        while($aRow=$oConnection->fetch($oResultSet)){
            $iImageId = $aRow['id'];
            $oImage = new Image();

            $oImage->load($iImageId);
            $aImages[] = $oImage;
        }
        return $aImages;
    }


    static public function listTypes(){

        
        $oConnection = new Connection;

        $sSQL = 'SELECT id,type_name FROM types';

        $oResultSet = $oConnection->query($sSQL);

        while($aRow = $oConnection->fetch($oResultSet)){
            $iTypeId = $aRow['id'];
            $aTypes[$iTypeId] = $aRow['type_name'];
        }
        return $aTypes;
    }

}

// test...
// echo '<pre>';
// print_r(TypeManager::listImages());
// echo '</pre>';
//
// echo '<pre>';
// print_r(TypeManager::getTypes());
// echo '</pre>';
