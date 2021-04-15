<?php

class App
{

    /*****
     * En klassvaraibel = statisk variabel
     */
    public static $endpoint = "https://jsonplaceholder.typicode.com/users";


    /*****
     * The Main Method
     */
    public static function main()
    {
        try {
            $array = self::getData();
            self::viewData($array);
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }


    /*****
     * En klassmetod som hämtar data
     */
    public static function getData()
    {
        $json =  @file_get_contents(self::$endpoint);
        if (!$json)
            throw new Exception("Could not access " . self::$endpoint);

        return json_decode($json, true);
    }

    /*****
     * En klassmetod som renderar data
     */
    public static function viewData($array)
    {
        $table = "<table class='table'>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>";
        foreach ($array as $user) {
            $table .= "<tr>
             <td> $user[name] </td>
             <td> $user[email] </td>
           </tr>";
        }
        $table .= "</table>";
        echo $table;
    }
}
