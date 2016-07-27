<?php





class View{

    static public function renderNav($aTypes){

        $sHTML = '<div class="dropdown nav navbar-nav">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">View by Type
                          <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                 <li class="hidden"><a href="#page-top"></a></li>';

        //make types

        $sHTML.='<li><a href="main_admin.php">All</a></li>';
        for($i=0; $i<count($aTypes); $i++){
            $oType = $aTypes[$i];
            $sHTML.='<li><a href="main_admin.php?typeid='.$oType->iId.'">
                              
                    '.$oType->sTypeName.'
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

            if($oImage->iVisible = 1){

                $sHTML .= '<header class="intro" style="background-image:url(image/'.$oImage->sFile.')">
                    <div class="intro-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1 class="brand-heading"></h1>
                                    <p class="intro-text"></p>
                                    <a href="vote_down.php?imageid='.$oImage->iId.'" class=" btn btn-circle page-scroll">
                                        <i class=" fa fa-angle-down animated"></i>
                                    </a>
                                    <a href="vote_up.php?imageid='.$oImage->iId.'" class=" btn btn-circle page-scroll">
                                        <i class="  fa fa-angle-up animated"></i>
                                        
                                    </a>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </header>';


            }

            

        }



        return $sHTML;
    }



    static public function renderAllImages($aImages){

        $sHTML = '';

        for($i=0; $i<count($aImages); $i++){

            
            
            $oImage = $aImages[$i];



                $sHTML .= '<header class="intro" style="background-image:url(image/' . $oImage->sFile . ')">
                    <div class="intro-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1 class="brand-heading"></h1>
                                    <p class="intro-text"></p>
                                    <a href="vote_down.php?imageid=' . $oImage->iId . '" class=" btn btn-circle page-scroll">
                                        <i class=" fa fa-angle-down animated"></i>
                                    </a>
                                    <a href="vote_up.php?imageid=' . $oImage->iId . '" class=" btn btn-circle page-scroll">
                                        <i class="  fa fa-angle-up animated"></i>                                        
                                    </a>
                                 
                                     <a href="delete_image.php?imageid=' . $oImage->iId . '" class="btn btn-circle page-scroll">
                                        <i class=" color-admin fa fa-times"></i>
                                    </a>                              
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </header>';


        }

//        echo'<pre>';
//        print_r ($aImages);
//        echo'</pre>';

        return $sHTML;

    }
}


