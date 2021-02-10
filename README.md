<h1>Projeto Demonstração Laravel Estoque</h1>

Compatibilidade

|Server | Versão | Suportado |
| ------- | ------------------ | ------|
| PHP   | 7.3.21 | :white_check_mark: |
| Laravel   | 8.x |:white_check_mark: |
| MYSQL  | 5.7.24 |:white_check_mark: |


Esse sistema utiliza API para uso externos.
<a href="#">link</a> aqui vai ser para baixar o banco de dados caso não queria utilizar o migration do laravel.

<h5>Utilização da API</h5>
<a href="#">http://localhost/api/login </a> - Metodo POST<br>
Para efetuar o login precisa ter uma conta cadastrada no sistema,
efetuando o login vai receber um TOKEN via JSON para poder utilizar API por completo.

<h5>Como utilizar o token recebido pelo LOGIN</h5>
Para consumir o token vai precisar colocar no <b>Authorization - Bearer</b> que fica dentro do programa postman.

<h5>Como usar API depois de receber o TOKEN</h5>
<a href="#">http://localhost/api/baixar-produtos </a> - utliza o metodo POST. <br>
Essa url vai te ajudar a dar baixa nos produtos do estoque, lembrando que tem que estar com o token gerado.<br>
no <b>postman</b> ou terceiros vai precisar usar em json da seguinte forma <b>{ "quantidade": 10, "produtos": [id,id,id] } </b> 
dessa forma ele vai ele vai tirar 10 de quantidade de cada produto colocado dentro da array.<br>
<br>
<a href="#">http://localhost/api/adicionar-produto</a> - utiliza o metodo POST.<br>
Essa url vai te ajudar a cadastrar um produto vou dar um exemplo em json 
<b> {"nome": "nome do produto", "quantidade": 10, "codigo_produto": 5}</b><br>
O <b>codigo do produto</b> não pode ser igual, pois ele é uma identificação de SKU para cada produto.
<br>

<h4>Acessando o sistema</h4>
Crie um banco com o nome desejado as configurações <b>InnoDB e uf8Unicode</b>,
para acessar o sistema é preciso criar uma conta na url <a href="#">http://localhost/register </a>

<br>
Autor do conteudo: Eduardo Parcianello de Avila


