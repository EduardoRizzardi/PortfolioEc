<?php
// Variáveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$telefone = $_POST['telefone'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Compo E-mail
$arquivo = "
<html>
  <p><b>Nome: </b>$nome</p>
  <p><b>E-mail: </b>$email</p>
  <p><b>Celular: </b>$telefone</p>
  <p><b>Mensagem: </b>$mensagem</p>
  <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
</html>
";

// Emails para quem será enviado o formulário
$destino = "edu.cappellari.rizzardi@gmail.com";
$assunto = "Contato pelo Site";

// Cabeçalhos
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "From: $nome <$email>";

// Enviar E-mail
if (mail($destino, $assunto, $arquivo, $headers)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
}

// Redirecionamento após 10 segundos
echo "<meta http-equiv='refresh' content='10;URL=C:\xampp\htdocs\Eduardo\Portifolio_Pessoal\index.html'>";
?>