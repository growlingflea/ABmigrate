<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Request;
use Session;
use DB;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ApplyController extends Controller
{


    //The limit is the max number of records taken by $csv->offset(0)->limit($limit) per iteration
    //The $max is the max number of records.
    //taking one round of 25 records method3(25,$csv,$headers,25)
    //4 rounds of 25 records equaling 100 records would be method3(25, $csv, $headers, 100)
    public function csvToTable($limit, $csv, $headers, $max, $table){

        $loffset = 0;
        $offset = 0;

        $start = microtime(true);

        while($loffset <= $max) {

            $res = $csv->setOffset($offset === 0 ? $offset = 1 : $offset =  $loffset)->setLimit($limit)->fetchAll();
            $loffset = $offset + $limit;
            foreach($res as $row){
                $combinedArray = array_combine($headers, $row);
                DB::table($table)->insertGetID($combinedArray);
            }

        }
        $end = microtime(true);
        $diff = abs($start - $end);
        return $diff;
    }




    public function upload() {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $mime = Input::file('image')->getMimeType();




                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $_POST['csv_filename'] = "$destinationPath/$fileName";
                $fileExists = file_exists ($_POST['csv_filename']);

                //dopr table if it exists
                Schema::connection('mysql')->dropIfExists('MasterReport');

                Schema::connection('mysql')->create('MasterReport', function (Blueprint $table) {
                    $fileName = $_POST['csv_filename'];
                    $csv = Reader::createFromPath($fileName);
                    $headers = $csv->fetchOne();
                    $table->increments('id');
                    foreach($headers as $header){
                    //PolicyID, contains Premium, contains Number,

                        if( strpos ('Date', $header) !== false){

                            $table->date($header);

                        }else if( strpos ('DOB', $header)!== false){

                            $table->date($header);

                        }else if( strpos ('Premium', $header)!== false){

                            $table->float($header, 8, 2);

                        }else if(

                        strpos ('Commission Frequency Advancement', $header) !== false ||
                        strpos ('Commission Frequency', $header) !== false ||
                        strpos ('Commissionable Premium', $header) !== false ||
                        strpos ('Agent Number', $header) !== false ){


                            $table->float($header, 8, 2);



                        }else{

                            $table->string($header);

                        } //end of header foreach loop

                        $table->engine = 'MyISAM';

                    }




                $_POST['csv_headers'] = $headers;






                });

            //Now that the table is created with the appropiate headers and class definitions, we can add the data.

                $headers = $_POST['csv_headers'];
                $_POST['csv'] = $csv = Reader::createFromPath($_POST['csv_filename']);
                $count = count($csv->fetchAll());

                DB::connection()->disableQueryLog();


               // method3($limit, $csv, $headers, $max)
                $testIter = 0;
                $diff[$testIter]   = $this -> csvToTable(1000,$csv,$headers, $count, 'MasterReport');

                foreach($diff as $record){
                    echo $record;
                }

                return Redirect::to('upload');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }
    }
}
