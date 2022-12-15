SISTEMA RODANDO EM PHP 8, O SISTEMA POSSUI UM PAINEL DE ADMINISTRADOR QUE PODE GERENCIAR CADASTRA E EXCLUIR VAGAS E CANDIDATOS ( QUE SÃO USUARIOS ),
O CANDIDATO SO PODE VISUALIZAR SUAS INSCRIÇÕES.

FOI USANDO AS SEGUINTES TECNOLOGIAS ( LARAVEL 8, midware de autenticacao, liveware, boostrap e banco mysql ), fico devendo apenas a parte do docker e teste. 

- 1) CLONAR O PROJETO 
- 2) ENTRAR NA PASTA DO PROJETO RENOMEAR O ARQUIVO .env.exemple para .env e colcar as configurações de banco
- 3) na pasta raiz do projeto digitar o comando ( composer install )
- 4) na pasta raiz do projeto digitar o comando ( php artisan migrate )
- 5) na pasta raiz do projeto digitar o comando ( php artisan db:seed )
- 5) na pasta raiz do projeto digitar o comando ( php artisan server )
