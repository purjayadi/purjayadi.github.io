
<!DOCTYPE HTML>
<html>
  <head>
    
    <title>WA Order</title>
          
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-OiWEn8WwtH+084y4yW2YhhH6z/qTSecHZuk/eiWtnvLtU+Z8lpDsmhOKkex6YARr" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-hQpvDQiCJaD2H465dQfA717v7lu5qHWtDbWNPvaTJ0ID5xnPUlVXnKzq7b8YUkbN" crossorigin="anonymous">
  </head>
  <body>
    <div class='container'>
        <div class="row" style='margin-top:50px'>
        <?php  $sub = $this->Mainmodel->waorder();
		$no = 1;
		foreach ($sub->result_array() as $rows){
		echo '
		<div class="col-sm-12">
          <h3 class="title"><a href="'.htmlspecialchars ($rows['url_redirect'],ENT_QUOTES,'UTF-8').'"target="_blank"" class="">'.htmlspecialchars ($rows['no_wa'],ENT_QUOTES,'UTF-8').'</a></h3>
          '.htmlspecialchars ($rows['text_wa'],ENT_QUOTES,'UTF-8').'           
        </div>
        ';
		}
		?>
      </div>
      <hr>
          </div>  
  </body>
</html>