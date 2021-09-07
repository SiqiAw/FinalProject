<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container" style="margin: 10px;">
        <form>
            <div class="form-group" style="padding: 10px;">
                <label for="">Username</label>
                <input type="text">
            </div>
            
            <div class="form-group" style="padding: 10px;">
                <label for="">Password</label>
                <input type="text">
            </div>
            
            <button id="submit" disabled="disabled" type="submit">Submit</button>
        </form>
    </div>

    <script type="text/javascript">
    (function() {
        $('form input').keyup(function() {

            var empty = false;
            $('form input').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });

            if (empty) {
                $('#submit').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
            } else {
                $('#submit').removeAttr('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
            }
        });
    })()
    </script>
</body>
</html>