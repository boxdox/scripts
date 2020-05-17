<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
			<title>Unzipper</title>
			<style>
        body {
            font-family: arial, sans-serif;
            word-wrap: break-word;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        
        .wrapper {
            padding: 20px;
            line-height: 1.5;
            font-size: 1rem;
            width: 80%;
            margin: 0 auto;
        }
        
        span {
            font-family: 'Consolas', 'courier new', monospace;
            background: #eee;
            padding: 2px;
        }
        
        p {
            font-family: 'Consolas', 'courier new', monospace;
            background: #eee;
        }
        
        h2 {
            font-family: arial, sans-serif;
            text-transform: uppercase;
            color: #7c2da5;
        }
			</style>
		</head>
		<body>
			<div class="wrapper">
				<h2>Unzipper</h2>
				<hr />
				<p>This script will extract the zip contents to this same directory!
            
					
					<br />
					<br />
					<span style="color:red;">NOTE:- The zip file and this script should be in the same directory!</span>
				</p>
				<br />
				<br />
				<form method="post">
					<label>Enter the name of zip file (with Extension)</label>
					<input name="zip" size="60" />
					<input name="submit" type="submit" />
		
			<?php
				if (!isset($_POST['submit']))
					die();
				$zip_filename = $_POST['zip'];
				echo "Unzipping 
									<span>" . __DIR__ . "/" . $zip_filename . "</span> to 
									<span>" . __DIR__ . "</span>
									<br>";
				echo "current dir: 
										<span>" . __DIR__ . "</span>
										<br>";
				$zip = new ZipArchive;
				$res = $zip->open(__DIR__ . '/' . $zip_filename);
				if ($res === TRUE) {
					$zip->extractTo(__DIR__);
					$zip->close();
					echo '
											<p style="color:#00C324;">Extract was successful! Enjoy ;)</p>
											<br>';
				} else {
					echo '
												<p style="color:red;">Zip file not found!</p>
												<br>';
				}
				?>
        End Script.
    
		
				</div>
			</body>
		</html>
