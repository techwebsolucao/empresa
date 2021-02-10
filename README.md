<h1>Projeto Demonstração Laravel Estoque</h1>

<h4>Versões </h4>

|Server | Version | Supported |
| ------- | ------------------ | ------|
| PHP   | 7.3.21 | :white_check_mark: |
| Laravel   | 8.x |:white_check_mark: |
| MYSQL  | 5.7.24 |:white_check_mark: |


Esse sistema utiliza API para usos externos pode usar com o postman para testes esse
<a href="#">link</a> aqui vai ser para baixar o banco de dados caso não queria utilizar o migration do laravel.

<h5>Como usar a API</h5>
http://localhost/api/login - utiliza o metodo POST<br>
no postman você precisa ter uma conta criada dentro do sistema primeiro para
poder logar com o postman, para utilizar o post faça via json email e senha(password).
no momento que ele fizer o login você vai receber um <b style="color: #fff">token</b> para poder utilizar api por completa.

<h5>Como utilizar o token recebido pelo LOGIN</h5>
Você vai receber um token via json, você copia ele e coloca no Authorization - Bearer.

<h5>Como usar API depois de receber o TOKEN</h5>
http://localhost/api/baixar-produtos - utliza o metodo POST <br>
Esse url vai te ajudar a dar baixa nos produtos do estoque, lembrando que tem que estar com o token gerado.<br>
no <b>postman</b> ou terceiros vai precisar usar em json da seguinte forma <b>{ "quantidade": 10, "produtos": [id,id,id] } </b> 
dessa forma ele vai ele vai tirar 10 de quantidade de cada produto colocado dentro da array.


