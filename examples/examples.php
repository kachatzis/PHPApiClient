<?php


  /**
   * PHPApiClient  Copyright (C) 2018  Konstantinos Chatzis <kachatzis@ece.auth.gr>
   *
   * This file is part of PHPApiClient.

   * PHPApiClient is free software: you can redistribute it and/or modify
   * it under the terms of the GNU General Public License as published by
   * the Free Software Foundation, either version 3 of the License, or
   * any later version.

   * PHPApiClient is distributed in the hope that it will be useful,
   * but WITHOUT ANY WARRANTY; without even the implied warranty of
   * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   * GNU General Public License for more details.
   */


  // Insert Class
  require_once 'utils/ApiClient.php';



  /********************************************************************************
  * Creating the ApiClient object
  */

  $api = new ApiClient();



  /********************************************************************************
  * Using the calls
  */


  // GET w/ filter  
  // $row_key indicates the row number, not the primary key of the object.
  //  Filter example: '(is_user=1)and(birthday>2018-20-12)&limit=100&sort=birthday'
  $api->get_filter({uri}, {filter});   
  foreach($api->get_resource() as $row_key=>$row){
    // Use
    $row->{column};
  }


  // GET Single Row
  $api->get_row({uri}, {id});
  // Use
  $api->get_resource()->{column};


  // GET All Objects (Limited by default to 1000 records from the API)
  // $row_key indicates the row number, not the primary key of the object.
  $api->get({uri});
  foreach($api->get_resource() as $row_key=>$row){
    // Use
    $row->{column};
  }


  // POST
  // Hint: In order to build the body easily, create an array such as:
  //  $body['resource']['birthday']='2000-20-12',
  // and call the function:
  //  post({uri}, $body)
  $api->set_id_name({id field});
  $api->post({uri}, [
    'resource'=> [
      {column} => {value}
    ]
  ]);


  // PATCH
  // Hint: In order to build the body easily, create an array such as:
  //  $body['resource']['birthday']='2000-20-12', $body['ids']='1'
  // and call the function:
  //  patch({uri}, $body)
  $api->patch({uri}, [
    "resource" => [
      {column} => {value}
    ],
    "ids" => [
      {id}
    ]
  ]);


  // DELETE
  $api->delete({uri}, {id});






  /********************************************************************************
  * Checking the response
  */

  if ($api->get_response_code() == 200){
    // Successful call
  } else {
    // Unsuccessful
  }

?>
