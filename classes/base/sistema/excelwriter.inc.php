<?php

     /*
     ###############################################
     ####                                       ####
     ####    Author : Harish Chauhan            ####
     ####    Date   : 31 Dec,2004               ####
     ####    Updated:                           ####
     ####                                       ####
     ###############################################

     */


     /*
     * Class is used for save the data into microsoft excel format.
     * It takes data into array or you can write data column vise.
     */


Class ExcelWriter{

   var $fp=null;
    var $error;
    var $state="CLOSED";
    var $newRow=false;

    /*
    * @Params : $file  : file name of excel file to be created.
    * @Return : On Success Valid File Pointer to file
    *             On Failure return false
    */
    function ExcelWriter($file="",$bsc="CELLPAR"){
        return $this->open($file);
    }

    /*
    * @Params : $file  : file name of excel file to be created.
    *                if you are using file name with directory i.e. test/myFile.xls
    *                then the directory must be existed on the system and have permissioned properly
    *                to write the file.
    * @Return : On Success Valid File Pointer to file
    *                On Failure return false
    */
    function open($file){
        if($this->state!="CLOSED"){
            $this->error="Error : Another file is opend .Close it to save the file";
            return false;
        }

        if(!empty($file)){
           $this->fp=@fopen($file,"w+");
        }else{
           $this->error="Usage : New ExcelWriter('fileName')";
            return false;
        }

      if($this->fp==false){
         $this->error="Error: Unable to open/create File.You may not have permmsion to write the file.";
            return false;
      }
        $this->state="OPENED";
        fwrite($this->fp,$this->GetHeader());
        return $this->fp;
   }

    function close(){
       if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
        if($this->newRow){
           fwrite($this->fp,"</tr>");
            $this->newRow=false;
        }
        fwrite($this->fp,$this->GetFooter());
        fclose($this->fp);
        $this->state="CLOSED";
        return;
    }

        /* @Params : Void
        *  @return : Void
        * This function write the header of Excel file.
        */
   function GetHeader(){
        $header = <<<EOH
        <html xmlns:o="urn:schemas-microsoft-com:office:office"
               xmlns:x="urn:schemas-microsoft-com:office:excel"
                xmlns="http://www.w3.org/TR/REC-html40">

                <head>
                <meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
                <meta name=ProgId content=Excel.Sheet>
                <!--[if gte mso 9]><xml>
                 <o:DocumentProperties>
                  <o:LastAuthor>Sriram</o:LastAuthor>
                  <o:LastSaved>2005-01-02T07:46:23Z</o:LastSaved>
                  <o:Version>10.2625</o:Version>
                 </o:DocumentProperties>
                 <o:OfficeDocumentSettings>
                  <o:DownloadComponents/>
                 </o:OfficeDocumentSettings>
                </xml><![endif]-->
                <style>
                <!--table
                    {mso-displayed-decimal-separator:"\.";
                    mso-displayed-thousand-separator:"\,";}
                @page
                    {margin:1.0in .75in 1.0in .75in;
                    mso-header-margin:.5in;
                    mso-footer-margin:.5in;}
                tr
                    {mso-height-source:auto;}
                col
                    {mso-width-source:auto;}
                br
                    {mso-data-placement:same-cell;}
                .style0
                    {mso-number-format:General;

                    mso-rotate:0;

                    color:windowtext;
                    font-size:10.0pt;
                    font-weight:400;
                    font-style:normal;
                    text-decoration:none;
                    font-family:Arial;
                    mso-generic-font-family:auto;
                    mso-font-charset:0;

                    mso-style-name:Normal;
                    mso-style-id:0;}
                td
                    {mso-style-parent:style0;
                    padding-top:1px;
                    padding-right:1px;
                    padding-left:1px;

                    color:windowtext;
                    font-size:10.0pt;
                    font-weight:400;
                    font-style:normal;
                    text-decoration:none;
                    font-family:Arial;
                    mso-generic-font-family:auto;
                    mso-font-charset:0;
                    mso-number-format:General;



                    mso-rotate:0;}
                .xl24
                    {mso-style-parent:style0; }
                -->
                </style>
                <!--[if gte mso 9]><xml>
                 <x:ExcelWorkbook>
                  <x:ExcelWorksheets>
                   <x:ExcelWorksheet>
                    <x:Name>NOME_PLANILHA</x:Name>
                    <x:WorksheetOptions>
                     <x:Selected/>
                     <x:ProtectContents>False</x:ProtectContents>
                     <x:ProtectObjects>False</x:ProtectObjects>
                     <x:ProtectScenarios>False</x:ProtectScenarios>
                    </x:WorksheetOptions>
                   </x:ExcelWorksheet>
                  </x:ExcelWorksheets>
                  <x:WindowHeight>10005</x:WindowHeight>
                  <x:WindowWidth>10005</x:WindowWidth>
                  <x:WindowTopX>120</x:WindowTopX>
                  <x:WindowTopY>135</x:WindowTopY>
                  <x:ProtectStructure>False</x:ProtectStructure>
                  <x:ProtectWindows>False</x:ProtectWindows>
                 </x:ExcelWorkbook>
                </xml><![endif]-->
                </head>

                <body link=blue vlink=purple>
                <table x:str border=1 cellpadding=0 cellspacing=0 style='border-collapse: collapse;table-layout:fixed;'>
EOH;
            return $header;
   }

    function GetFooter(){
       return "</table></body></html>";
    }

    /*
    * @Params : $line_arr: An valid array
    * @Return : Void       mso-ignore:padding;
    */

    function writeLine($line_arr){
       if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
        if(!is_array($line_arr)){
           $this->error="Error : Argument is not valid. Supply an valid Array.";
            return false;
        }
        fwrite($this->fp,"<tr>");
        foreach($line_arr as $col)
           if($col == ""){
               fwrite($this->fp,"<td class=xl24 width=64 align='center' > --- </td>");
           }else{
               fwrite($this->fp,"<td class=xl24 width=64 >$col</td>");
           }
           
        fwrite($this->fp,"</tr>");
    }

    function writeLinePerson($line_arr, $colspan, $background_color, $align, $weight){
       if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
        if(!is_array($line_arr)){
           $this->error="Error : Argument is not valid. Supply an valid Array.";
            return false;
        }
        fwrite($this->fp,"<tr>");
        foreach($line_arr as $col)
           fwrite($this->fp,"<td class=xl24 width=64 colspan=$colspan bgcolor=$background_color align=$align style='font-weight: $weight;' >$col</td>");
        fwrite($this->fp,"</tr>");
    }

    function writeLineCabecalho($name1, $name2, $color1, $color2, $font1, $font2, $colspan, $align, $weight, $size){
       if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
        /*if(!is_array($line_arr)){
           $this->error="Error : Argument is not valid. Supply an valid Array.";
            return false;
        }*/
        fwrite($this->fp,"<tr style='border-top: none; border-left: none; border-right: none;'>");
        //foreach($line_arr as $col)
           fwrite($this->fp,"<td class=xl24 width=64 colspan=$colspan align=$align style='font-size: $size; padding-bottom: 5px;' >
           <font style='color: $color1; font-family: $font1;'>$name1</font>
           <font style='color: $color2; font-family: $font2; font-weight: $weight;'>$name2</font>

                           </td>");
        fwrite($this->fp,"</tr>");
    }


    function writeLineCabecalhoMovimentacao($name1, $name2, $color1, $color2, $font1, $font2, $colspan, $align, $weight, $size, $bgcolor1, $bgcolor2){
       if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
        /*if(!is_array($line_arr)){
           $this->error="Error : Argument is not valid. Supply an valid Array.";
            return false;
        }*/
        fwrite($this->fp,"<tr style='border-top: none; border-left: none; border-right: none;'>");
        //foreach($line_arr as $col)
           fwrite($this->fp,"<td class=xl24 width=64 colspan=$colspan align=$align style='font-size: $size; padding-bottom: 5px;' bgcolor=$bgcolor1 >
           <font style='color: $color1; font-family: $font1; font-weight: $weight;'>$name1</font> </td>");

          fwrite($this->fp,"<td class=xl24 width=64 colspan=3 align=$align style='font-size: $size; padding-bottom: 5px;' bgcolor=$bgcolor2>
           <font style='color: $color2; font-family: $font2; font-weight: $weight;'>$name2</font></td>");

        fwrite($this->fp,"</tr>");
    }

    /*
    * @Params : Void
    * @Return : Void
    */
    function writeRow(){
      if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
       if($this->newRow==false){
         fwrite($this->fp,"<tr>");
       }else{
           fwrite($this->fp,"</tr><tr>");
            $this->newRow=true;
        }
   }

    /*
    * @Params : $value : Coloumn Value
    * @Return : Void
    */
    function writeCol($value){
       if($this->state!="OPENED"){
          $this->error="Error : Please open the file.";
            return false;
       }
        fwrite($this->fp,"<td class=xl24 width=64 >$value</td>");
    }
}

?>
