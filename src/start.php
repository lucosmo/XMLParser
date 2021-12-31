<?php
    require "xmlparser.php";
    require "node.php";

    if (isset($argc)) {
        if ($argc != 2) {
            echo( "Wrong number of arguments! \n start.php xmlfilename \n xmlfilename - name of xml file.\n");
        }
        else {
            $parser = new Xmlparser($argv[1]);
            $data = $parser->getXML();
            $nodes = $parser->loadData($data);
            menu($nodes);
            
        }
    }
    else {
        echo "argc and argv disabled\n";
    }

    /**
    * showNextNode
    *
    */
    function showNextNode($nodes, $i) {
        system('clear');
        echo "PHP APP reads books data from xml file, import to array of objects (Node)\n";
        echo "By pressing ENTER key on your keyboard you can move to next Node object.\n\n";
        echo "==================================BOOKS==================================\n";
        echo $nodes[$i];
        echo "\n=========================================================================\n\n";     
    }
    

    function menu($nodes) {
        $i = 0;
        while(($line = readline("\nCommand (h) for help, (e) for exit, ENTER for next Book: ")) != "e"){

            switch($line){
                case 'h':
                    echo "\nPress ENTER for next node\n";
                    break;
                case '':
                default:    
                    showNextNode($nodes,$i);
                    if($i+1>=count($nodes)) {
                        $i = 0;
                    } else {
                        $i++;
                    }
                    
            }
        }
    }
    
?>
