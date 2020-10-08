<?php

//
class csv extends mysqli {

    //connection method
    function __construct()
    {
        parent::__construct("127.0.0.1","root","","file");
        if ($this->connect_error){
            echo "No connection:".$this->connect_error;

        }

    }

    //importing csv to mysqli
    public function import($file){
        $file=fopen($file,'r');
        while ($row=fgetcsv($file)){
            $value="'".implode("','",$row)."'";
            $q="INSERT INTO products(model_number,category_name,department_name,manufacturer_name,upc,sku,regular_price,sale_price,description,url)
            VALUES(".$value.")";

            //check if file is csv
            if ($this->query($q)){
                $this->state_csv=true;
            } else{
                $this->state_csv=false;
            }
        }
        //msg check for import success or not
        if ($this->state_csv){
            echo "Successfully Imported";
        } else  {
            echo "No Import";
        }
    }

}