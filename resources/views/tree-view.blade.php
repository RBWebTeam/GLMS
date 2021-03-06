<!DOCTYPE html>
<html lang="en">
<head runat="server">
    
   
    
    <link type="text/css" rel="Stylesheet" href="css/treeviewstyle.css" />
    
    <script type="text/javascript" src="js/JScript.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
</head>

<body>

    <img src="images/blur1.jpg" class="bg" alt="Blur Background" />

    <script type="text/javascript">
        $(document).ready(function() {
        
        //Class 'contentContainer' refers to 'li' that has child with it.
        //By default the child ul of 'contentContainer' will be set to 'display:none'
        
            $("#treeMenu li").toggle(           
            
                  function() { // START FIRST CLICK FUNCTION
                      $(this).children('ul').slideDown()
                      if ($(this).hasClass('contentContainer')) {   
                          $(this).removeClass('contentContainer').addClass('contentViewing');
                      }
                  }, // END FIRST CLICK FUNCTION
                  
                  function() { // START SECOND CLICK FUNCTION
                      $(this).children('ul').slideUp()

                      if ($(this).hasClass('contentViewing')) {
                          $(this).removeClass('contentViewing').addClass('contentContainer');
                      }
                        } // END SECOND CLICK FUNCTIOn
                    ); // END TOGGLE FUNCTION 
                    
        }); // END DOCUMENT READY

     
    </script>

   
    <div class="page-container">
    
        <!-- <div class="backTutorial">
            
            <a href="http://mediamilan.com/how-to-create-simple-tree-structure-menu-using-jquery-and-css/" title="Back to the Tutorial">&larr; Back to Media Milan Tutos</a>
            
        </div> -->
    
        <ul id="treeMenu">
         
            <input type="checkbox" name="Tamilnadu" id="Tamilnadu">
            
                <ul style="display: none">
                    
                    <li class="contentContainer" >Trichy
                        
                        <ul style="display: none" >
                            
                            <li>BHEL</li>
                            
                            <li class="contentContainer">Thiruverumbur
                            
                                <ul style="display: none">
                                    <li>BagavathiPuram</li>
                                    <li>VOC Nagar</li>
                                </ul>
                                
                            </li>
                            
                            <li>Thillai Nagar</li>
                            
                        </ul>
                        
                    </li> <!-- END TRICHY -->
                    
                    <li>Selam</li>
                    <li>Chennai</li>
                    <li>Madurai</li>
                    
                </ul>
                
            </li> 
            <!-- <li class="main">Bangalore</li>
            
            <li class="main">Orissa</li>
            
            <li class="contentContainer">Kerela
            
                <ul style="display:none">
                    <li>Mangalore</li>
                    <li>Calicut</li>
                    <li>Cochin</li>
                </ul>
                
            </li>
            
            <li class="main">Andhra</li> -->
            
        </ul> <!-- END TREE MENU -->
            
            <a class="mm" href="http://mediamilan.com/" title="Go to Media Milan.com" target="_blank"></a>
            
    </div> <!-- END PAGE CONTAINER -->
    
</body>
</html>


