<?php
if($_POST)
	{
		try 
		{
			 $db = new PDO("mysql:host=localhost;dbname=lototalha", "root", "");
			 $db->exec("set names utf8");
		} catch ( PDOException $e ){
			 print $e->getMessage();
		}

		$sayilar=array();
		
		for($i=0;$i<=6;$i++)
		{
			$uretilen=rand(1,49);
			$sayilar[$i]=$uretilen;
			if(in_array($uretilen,$sayilar))
			{   
					$uretilen=rand(1,49);
					$sayilar[$i]=$uretilen;
				
			}
			
			
			
		}
		
		
		$veritabaniekle=$db->prepare("insert into girilensayilar SET birinci=?,ikinci=?,ucuncu=?,dorduncu=?,besinci=?,altinci=?");
		$veritabaniekle->execute(array($sayilar[0],$sayilar[1],$sayilar[2],$sayilar[3],$sayilar[4],$sayilar[5]));
		
		$sayi1=$_POST["birinci"];
		$sayi2=$_POST["ikinci"];
		$sayi3=$_POST["ucuncu"];
		$sayi4=$_POST["dorduncu"];
		$sayi5=$_POST["besinci"];
		$sayi6=$_POST["altinci"];
		
		if(!empty($sayi1) && !empty($sayi2) && !empty($sayi3) && !empty($sayi4) && !empty($sayi5) && !empty($sayi6))
		{
			
		
		
			if(@$sayi1==@$sayi2 || @$sayi1==@$sayi3 || @$sayi1==@$sayi4 || @$sayi1==@$sayi5 || @$sayi1==@$sayi6  ||  @$sayi2==@$sayi3 || @$sayi2==@$sayi4 || @$sayi2==@$sayi5 || @$sayi2==@$sayi6  || @$sayi3==@$sayi4 || @$sayi3==@$sayi5  ||  @$sayi3==@$sayi6 ||  @$sayi4==@$sayi5 || @$sayi4==@$sayi6 || @$sayi5==@$sayi6 || $sayi1 > 49  || $sayi2 > 49 || $sayi3 > 49 || $sayi4 > 49 || $sayi5 > 49 || $sayi6 > 49)
			{
					echo "<script>alert('ayni sayi giremezsiniz');</script>";
				
			}
			else
			{
				
			
			
			
				
				
			
			
					$arrayim = array();
					array_push($arrayim, $sayi1,$sayi2,$sayi3,$sayi4,$sayi5,$sayi6);
					
					
					$z=0;
					$eslesenler=array();
					for($i=0;$i<6;$i++)
					{
						if(in_array($arrayim[$i],$sayilar))
						{
							$z++;
							array_push($eslesenler,$arrayim[$i]);
						}
					}
					
					
					echo "<hr/>";
					echo "RASGELE SAYILAR :<br> ";
					print_r($sayilar);
					
					echo "<hr/>";
					echo "KLAVYEDEN GELEN SAYILAR :<br> ";
					print_r($arrayim);
					
					
					echo "<hr/>";
					echo "ESLESEN SAYILAR :<br> ";
					
					
					
					
					print_r($eslesenler);
			
				
		   
			}
		}
		else
		{
			echo "<script>alert('Bos Bırakamazsınız');</script>";
			
		}
}



?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">
		
			<h2>LOTO  <small>1 49 Arası Sayı Giriniz</small></h2>
			<hr class="colorgraph">
		 <form method="post" action="">	
			<div class="row">
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
                        <input type="text" autocomplete="off" name="birinci" id="first_name" class="form-control input-lg" placeholder="Birinci K" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
						<input type="text" autocomplete="off" name="ikinci" id="last_name" class="form-control input-lg" placeholder="İkinci K" tabindex="2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
						<input type="text" autocomplete="off" name="ucuncu" id="last_name" class="form-control input-lg" placeholder="Ucuncu K" tabindex="2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
						<input type="text" autocomplete="off" autocomplete="off" name="dorduncu" id="last_name" class="form-control input-lg" placeholder="Dorduncu K" tabindex="2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
						<input type="text" autocomplete="off" name="besinci" id="last_name" class="form-control input-lg" placeholder="Besinci K" tabindex="2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
						<input type="text" autocomplete="off" name="altinci" id="last_name" class="form-control input-lg" placeholder="Altinci K" tabindex="2">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Oyna" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				
			</div>
		 </form>	
			
			
		
			
			
	</div>
</div>
<!-- Modal -->

</div>

<script>
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});

</script>