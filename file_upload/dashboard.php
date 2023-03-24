<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<h1>Dashboard</h1>
	
    
    <div id="renderzone">
        
    </div>

    <script>
        render_usuarios()
        function render_usuarios(){
            fetch('cards_usuarios.php', {})
            .then((response) => response.text())
            .then((html) => {
                document.querySelector('#renderzone').innerHTML = html;
            })
        }

        function render_respostas(usuario){
            fetch('cards_respostas.php?usuario='+usuario, {})
            .then((response) => response.text())
            .then((html) => {
                document.querySelector('#renderzone').innerHTML = html;
            })
        }

        function render_evidencias(usuario,resposta){
            fetch('cards_evidencias.php?usuario='+usuario+'&resposta='+resposta, {})
            .then((response) => response.text())
            .then((html) => {
                document.querySelector('#renderzone').innerHTML = html;
            })
        }
    </script>
</body>
</html>