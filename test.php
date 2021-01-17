<?php

    function get($key){
        global $_POST;
        return isset($_POST[$key])?$_POST[$key]:"";
    }

    if (get('validare') == "OK"){
        require('./pdfLib/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->Image('bg.jpg', 0, 0, -150);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(13, 10, '', 0, 0);
        $pdf->Cell(190 - 13, 10, 'Exemplu - PHP PDF Generator', 1, 1);

        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 7, 'Data 1: ' . get('data_1'), 0, 1);
        $pdf->Cell(190, 7, 'Data 2: ' . get('data_2'), 0, 1);
        $pdf->Cell(190, 7, 'Data 3: ' . get('data_3'), 0, 1);
        $pdf->Cell(190, 7, 'Data 4: ' . get('data_4'), 0, 1);
        $pdf->Cell(190, 7, 'Data si ora generarii: ' . date("d M y (H:i)"), 1, 1);

        $pdf->Ln(10);

        $pdf->Image('favicon.png', 10, 10, -300);

        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(40, 10, 'Made by: www.aninu.ro using PHP-fPDF', 0, 1);


        $pdf->Output();
    }else{
?>
<html>
    <head>
        <title>Exemplu PDF</title>
    </head>
    <body>
        <form action="" method="POST">
            <div>
                <label for="data_1">Input for Data 1:</label>
                <input type="text" id="data_1" name="data_1" placeholder="Input for Data 1*"/>
            </div>
            <div>
                <label for="data_2">Input for Data 2:</label>
                <input type="text" id="data_2" name="data_2" placeholder="Input for Data 2*"/>
            </div>
            <div>
                <label for="data_3">Input for Data 3:</label>
                <input type="text" id="data_3" name="data_3" placeholder="Input for Data 3*"/>
            </div>
            <div>
                <label for="data_4">Input for Data 4:</label>
                <input type="text" id="data_4" name="data_4" placeholder="Input for Data 4*"/>
            </div>
            <div>
                <input type="submit" name="validare" value="OK">
            </div>
        </form>
    </body>
</html>

<?PHP } ?>
