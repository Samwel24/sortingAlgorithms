<!DOCTYPE html>
<html>
<head>
	<title>Search and Sort</title>
</head>
<body>
	<?php
		function bubbleSort($arr){
			for($i = 0; $i < (count($arr) - 1);$i++){
				$arr[$i] = (int) $arr[$i];

				//i represents how many elements have bubbled to correct place			
				for($j = 0; ($j + 1) < count($arr); $j++){
					$arr[$j] = (int) $arr[$j];
					if($arr[$j] < $arr[$j + 1]){
						
						//the swap
						$temp = $arr[$j];
						$arr[$j] = $arr[$j + 1];
						$arr[$j + 1] = $temp;
					}
				}
			}
			return implode(', ', $arr);
		}

		if(isset($_POST['sort'])){
			$input = $_POST['numbers'];
			$err = '';
			if($input == ""){
				$err = "Please enter valid inputs";
			} elseif(!is_string($input)){
				$err = "Please enter valid string in this order e.g 2,3,4,";
			} else {
				$arr = explode(",", $input);
				$ret = bubbleSort($arr);
			}
		}

	?>
	<div class="container">
		<form action="" method="post">
			<input type="text" style="width: 250px;height: 35px" name="numbers" id="numbers" value="<?php echo (isset($input))? $input : ""?>" placeholder="e.g 21,4,3,5,66,63,22"><br>
			<span id="mssg"></span><br>
			<button onclick="return sortr();">Javascript Sort</button>
			<button type="submit" name="sort">PHP Sort</button><br>
			<output  style="width: 250px;height: 35px" name="answers" id="answers" ><?php echo (isset($ret))? $ret : ""?></output>
		</form>
	</div>
	<br>
	<div>
		<ul>
		<li>
			<a href="index.php">Home</a>
		</li>
		<li>
			<a href="searchandsort.php">Selection sort</a>
		</li>
	</ul>
	</div>
</body>
<script type="text/javascript">
	function sortr(){

		
		input = document.getElementById('numbers').value;
		err = document.getElementById('mssg');
		if(input == ""){
			err.innerText = "Please enter valid inputs";
		} else if(typeof input !== "string"){
			err.innerText = "Please enter valid string in this order e.g 2,3,4,";
		} else {
			arr = input.split(",");
			ret = bubbleSort(arr);
			document.getElementById('answers').innerText = ret;
		}
		return false;
	}

	function bubbleSort(arr){
		for(i = 0; i < arr.length - 1;i++){
			arr[i] = parseInt(arr[i]);

			//i represents how many elements have bubbled to correct place			
			for(j = 0; j + 1 < arr.length; j++){
				arr[j] = parseInt(arr[j]);
				if(arr[j] < arr[j + 1]){
					
					//the swap
					temp = arr[j];
					arr[j] = arr[j + 1];
					arr[j + 1] = temp;
				}
			}
		}
		return arr;
	}
</script>
</html>