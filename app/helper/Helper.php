<?php

namespace App\helper;

use Illuminate\Support\Facades\Mail;
use App\Option;

class Helper {

    //// function for return response in json format ///////
    public static function responseJson($status, $message, $data = null) {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response);
    }

    public static function removeFile($filename) {
        try {
            unlink($filename);
            return true;
        } catch (\Exception $exc) {
            return false;
        }
    }

    public static function validateExtension($extension) {
        $exts = [
            "jpeg",
            "png",
            "jpg",
            "gif",
            "bmp",
        ];

        if (in_array($exts, $extension))
            return true;

        return false;
    }

    public static function randColor() {
        $colors = [
            "w3-red",
            "w3-pink",
            "w3-green",
            "w3-blue",
            "w3-purple",
            "w3-deep-purple",
            "w3-indigo",
            "w3-light-blue",
            "w3-cyan",
            "w3-aqua",
            "w3-teal",
            "w3-lime",
            "w3-light-green",
            "w3-orange",
            "w3-blue-gray",
            "w3-brown",
        ];

        return $colors[array_rand($colors)];
    }

    public static function uploadImg($file, $folder = '/', $action) {

        $filename = "";
        if ($file) {
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $dest = public_path('/images' . $folder);
            $file->move($dest, $filename);

            $action($filename);
        }
        return $filename;
    }

    public static function uploadFile($file, $folder = '/', $action) {
        $filename = "";
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $dest = public_path('/file' . $folder);
            $file->move($dest, $filename);

            $action($filename);
        }

        return $filename;
    }

    /**
     * send email api
     * 
     * @param String $to       destination email 
     * @param String $message  the message of the email
     * @param String $subject  the subject of the email
     * @param String $from     the emai will send the message 
     * @return boolean         true if sent, false if not
     */
    public static function sendMail($to, $subject, $message, $from = "nogal-furniture@nogal-furniture.com") {
        $response = null;
        try {
            $message = str_replace("\n", "\r", $message);
            $subject = str_replace("\n", "\r", $subject);


            ini_set("SMTP", "aspmx.l.google.com");
            ini_set("sendmail_from", "admin@gmail.com");


            $headers = array(
                'From' => $from,
                'To' => $to,
                'Subject' => $subject,
                'MIME-Version' => '1.0',
                'Content-Type' => "text/html; charset=ISO-8859-1"
            );

            $response = mail($to, $subject, $message, $headers);
        } catch (\Exception $exc) {
            
        }

        return $response;
    }

    /* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
    /* ::                                                                         : */
    /* ::  This routine calculates the distance between two points (given the     : */
    /* ::  latitude/longitude of those points). It is being used to calculate     : */
    /* ::  the distance between two locations using GeoDataSource(TM) Products    : */
    /* ::                                                                         : */
    /* ::  Definitions:                                                           : */
    /* ::    South latitudes are negative, east longitudes are positive           : */
    /* ::                                                                         : */
    /* ::  Passed to function:                                                    : */
    /* ::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  : */
    /* ::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  : */
    /* ::    unit = the unit you desire for results                               : */
    /* ::           where: 'M' is statute miles (default)                         : */
    /* ::                  'K' is kilometers                                      : */
    /* ::                  'N' is nautical miles                                  : */
    /* ::  Worldwide cities and other features databases with latitude longitude  : */
    /* ::  are available at https://www.geodatasource.com                          : */
    /* ::                                                                         : */
    /* ::  For enquiries, please contact sales@geodatasource.com                  : */
    /* ::                                                                         : */
    /* ::  Official Web site: https://www.geodatasource.com                        : */
    /* ::                                                                         : */
    /* ::         GeoDataSource.com (C) All Rights Reserved 2018                  : */
    /* ::                                                                         : */
    /* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */

    public static function latLangDistance($lat1, $lon1, $lat2, $lon2, $unit = "K") {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }

    /**
     * random token every milisecond encrypted
     * @return type String
     */
    function randamToken() {
        // time in mili seconds 
        $timeInMiliSeconds = (int) round(microtime(true) * 1000);

        // random number with 8 digit
        $randKey1 = rand(11111111, 99999999);

        // token
        $token = $timeInMiliSeconds + $randKey1;

        // convert token to array
        $tokenToArray = str_split($token);

        // shif array
        array_shift($tokenToArray);

        // array to string
        $token = implode("", $tokenToArray);

        // encrypt token
        $cryptedToken = encrypt($token);

        // return token in small size
        $b = json_decode(base64_decode($cryptedToken));

        // return mac attribute
        return $b->mac;
    }

}
