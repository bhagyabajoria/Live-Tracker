<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Images</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
			<input class="form-control mt-4" type="file" name="image" id="">
			<input class="form-control mt-4" type="text" name="tm" id="" placeholder="Team No.">
            <input class="form-control mt-4" type="text" name="tn" id="" placeholder="Team Name">            
            <button type="button" class="btn btn-primary bhg mt-4"><a href="../live3">Go back</a></button>
            <input class="btn btn-primary mt-4" type="submit" value="Upload" name="submit">
        </form>
    </div>
</body>
</html>