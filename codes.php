<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        header {
            padding: 10px 16px;
            background: lightgray;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        table {
            margin-top: 30px;
            margin-bottom: 60px;
        }
    </style>
</head>

<body>
    <h1 id="top">Status Codes</h1>
    <header>
        <a>Search: </a>
        <input type="text" value="" name="search" id="searchTxt" onchange="onChange();">
        <a>Last search:
            <span id="last"></span>
        </a>
    </header>
    <?php
        include_once("plugins/codes/codes.html");
    ?>
        <script>
            function onChange() {
                var input = document.getElementById("searchTxt").value;
                if (!input)
                    return;
                var codes = document.getElementsByTagName("td");

                for (let i = 0; i < codes.length; i++) {
                    const element = codes[i];
                    console.log(element);
                    if (element.innerText.toLowerCase().includes(input.toLowerCase())) {
                        element.style.color = "red";
                        if (i > 10)
                            codes[i - 10].scrollIntoView()
                        else if (i <= 10)
                            document.getElementById("top").scrollIntoView();
                        else
                            element.scrollIntoView();
                    } else
                        element.style.color = "black";
                }

                document.getElementById("last").innerText = input;
            }
        </script>
</body>

</html>