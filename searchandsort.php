<!DOCTYPE html>
<html>
<head>
	<title>Search and Sort</title>
</head>
<body>
	<?php
		function selectionSort($arr){
			for($i = 0; $i < (count($arr) - 1);$i++){
				$arr[$i] = (int) $arr[$i];
				$smallerNumber = $i;
				for($j = $i + 1; $j < count($arr); $j++){
					$arr[$j] = (int) $arr[$j];
					if($arr[$j] < $arr[$smallerNumber]){
						$smallerNumber = $j;
					}
				}
				//the swap
				$temp = $arr[$i];
				$arr[$i] = $arr[$smallerNumber];
				$arr[$smallerNumber] = $temp;
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
				$ret = selectionSort($arr);
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
			<a href="bubblesort.php">Bubble sort</a>
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
			ret = selectionSort(arr);
			document.getElementById('answers').innerText = ret;
		}
		return false;
	}

	function selectionSort(arr){
		for(i = 0; i < arr.length - 1;i++){
			arr[i] = parseInt(arr[i]);
			var smallerNumber = i;
			for(j = i + 1; j < arr.length; j++){
				arr[j] = parseInt(arr[j]);
				if(arr[j] < arr[smallerNumber]){
					smallerNumber = j;
				}
			}
			//the swap
			temp = arr[i];
			arr[i] = arr[smallerNumber];
			arr[smallerNumber] = temp;
		}
		return arr;
	}
</script>
</html>