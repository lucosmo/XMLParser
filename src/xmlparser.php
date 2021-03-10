<?php


class xmlparser {
    private $file1;
    private $arrayNodes;

    function __construct($file2) {
        $this->file1 = $file2;
        $this->arrayNodes = array();
    }

    private function openXMLFile($file2) {
        if (!file_exists($file2) or !is_readable($file2)) {
            throw new Exception("Unable to open the file!");
        } else {
            return simplexml_load_file("$file2");
        }
    }

    public function getXML() {
        try {
            $xmlfile = $this->openXMLFile($this->file1);
            return $xmlfile;
        }
        catch(Exception $e) {
            error_log($e->getMessage(), 3, "errors.log");
        }
            
    }

    public function loadData($xmlfile) {
        $nodeArray = [];
        try {       
            foreach($xmlfile->book as $book){
                $dataArray = [];
                $dataArray["id"] = (string)($book[0]->attributes());
                $dataArray["author"] = (string)($book->author);
                $dataArray["title"] = (string)($book->title);
                $dataArray["genre"] = (string)($book->genre);
                $dataArray["price"] = (string)($book->price);
                $dataArray["publish_date"] = (string)($book->publish_date);
                $dataArray["description"] = (string)($book->description);
                array_push($nodeArray,new Node($dataArray));
            }
        }
        catch(Exception $e) {
            error_log($e->getMessage(), 3, "errors.log");
        }
        return $nodeArray;
    }

}
?>