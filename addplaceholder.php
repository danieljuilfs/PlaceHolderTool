<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Placeholder Tool</title>
    <link rel="stylesheet" href="toolcss.css">
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>
<body class="bodygrid">
    <div class="centerform">
        <h1 class="phtitle">Create item editor placeholder items</></h1>
            <form hx-post=addphs.php hx-trigger="submit" hx-target=".results" class="formbg">
                <div class="formmargin">
                    <div class="formdiv">
                        <label for="dev_name" class="dev_name">Developer Name:</label>
                        <input type="text" name="dev_name" >
                    </div>
                    <div class="formdiv">
                        <label for="amount">Number of Placeholders:</label>
                        <input type="text" name="amount">
                    </div>
                    <div class="formdiv">
                        <label for="start">First Item ID:</label>
                        <input type="text" name="start">
                    </div>
                    <div class="formdiv">
                        <label for="img">Icon Image ID:</label>
                        <input type="text" name="img">
                    </div>
                    <div class="formdiv">
                        <input type="submit" value="Submit" class="formbutton">
                    </div>
                </div>
            </form>
    </div>
    <div class="results"></div>
<?php 
