<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.13.
 * Time: 21:54
 */

namespace Letscodehu\HumbugHtml;


class StreamWriter {

    public function putContents($filepath, $content){
        try {
            $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
            if($isInFolder) {
                $folderName = $filepathMatches[1];
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0777, true);
                }
            }
            file_put_contents($filepath, $content);
        } catch (\Exception $e) {
            echo "ERR: error writing '$content' to '$filepath', ". $e->getMessage();
        }
    }

}