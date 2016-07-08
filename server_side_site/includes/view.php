<?php

class View{

    static public function renderNav($aTypes){

        $sHTML = '<div class="dropdown nav navbar-nav">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">View by Type
                          <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                 <li class="hidden"><a href="#page-top"></a></li>';

            //make types

            for($i=0; $i<count($aTypes); $i++){
                $oType = $aTypes[$i];
                $sHTML.='<li><a href="main.php?typeid='.$oType->iId.'">'.$oType->sTypeName.'
                </a></li>';
            }

            $sHTML.='</ul>
                    </div>';

            return $sHTML;
    }


    static public function renderType($oType){

        $sHTML = '';

        $aImages = $oType->aImages;

        for($i=0; $i<count($aImages); $i++){

            $oImage = $aImages[$i];

            $sHTML .= '<header class="intro" style="background-image:url(image/'.$oImage->sFile.')">
                    <div class="intro-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1 class="brand-heading"></h1>
                                    <p class="intro-text">image</p>
                                    <a href="#about" class="btn btn-circle page-scroll">
                                        <i class="fa fa-angle-double-down animated"></i>
                                    </a>
                                    <a href="#about" class="btn btn-circle page-scroll">
                                        <i class="fa fa-angle-double-up animated"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>';

        }
        return $sHTML;
    }
}

                        




