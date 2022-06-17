<html>
  <head>
    <title>Users</title>
  </head>
  <body>
    <h1>Users</h1>
    <ul>
    <?php
    /* first we will make sure we have data to display. $users variable is actually the $data['users'] that we sent from the controller to the view... */
    if(!empty($users))
    {
      foreach($users as $user) // user is a class, because we decided in the model to send the results as a class.
      {
        echo "<li>Name: ".$user->usr_name."; Email: ".$user->usr_mail."</li>";
      }
    }
    ?>
    </ul>
  </body>
</html>
<!-- test -->
