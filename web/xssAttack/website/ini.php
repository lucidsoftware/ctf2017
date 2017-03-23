 <!DOCTYPE html>
<html>
	<body>
		<?php 
		$name = htmlspecialchars($_GET['Name'])
		$field = htmlspecialchars($_GET['Thoughts'])
		$thought = $_GET['Thoughts']
		>
		<h1>What do you think of 

			<?php

			echo $name;

			?>
		</h1>

		<input type="number">
			$thought
		</input>

	</body>
</html> 