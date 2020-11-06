 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php
         echo Form::open(array('url'=>'foo/bar'));

         	echo 'Randomly Selected Digit Number';
         	echo '<br/>';
			echo '<br/>';
            echo Form::text('digit',"",array('placeholder' => 'Digit'));
            echo '<br/>';
            echo '<br/>';


            echo Form::submit('Submit');
         echo Form::close();


         	//echo '$timer';
      ?>
 </body>
 </html>     
