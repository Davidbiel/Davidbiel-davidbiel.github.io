<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textura"])) {
    $file = $_FILES["textura"];

    // Verifica se houve algum erro no upload
    if ($file["error"] > 0) {
        echo "Erro: " . $file["error"];
    } else {
        // Verifica se o arquivo é um arquivo ZIP
        $fileType = pathinfo($file["name"], PATHINFO_EXTENSION);
        if ($fileType != "zip") {
            echo "Por favor, selecione um arquivo ZIP.";
        } else {
            // Define o caminho de destino para o arquivo ZIP
            $uploadPath = "texturas/" . $file["name"];

            // Move o arquivo ZIP para a pasta de destino
            if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                echo "O arquivo foi enviado com sucesso.";
            } else {
                echo "Erro ao enviar o arquivo.";
            }
        }
    }
} else {
    echo "Por favor, selecione um arquivo para enviar.";
}
?>
