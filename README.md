# AppTCO

Projeto de exemplo de uma aplicação de pagamentos de fornecedores usando Laravel/Docker (Laradock), Bootstrap e jQuery.

Neste projeto o app e a api estão em container separados.

## Requisitos

- Este projeto foi feito usando o Docker, para instalar este siga os passos [aqui](https://docs.docker.com/compose/install/).
- Você deve se cadastrar no site do Mailtrap para inserir sua MAIL_USERNAME e MAIL_PASSWORD no .env do App (app_tco/tco/.env).


## Componentes

Os componentes utilizados neste projeto/image são:
- docker-compose version 1.18.0
- laravel 5.7.27
- [laradock lastest version](https://laradock.io/)
- php 7.2
- mysql 5.7
- bootstrap 4.1.3
- jquery 3.3.1
- jquery.mask 1.14.15
- fontawesome v5.7.2
- PHPUnit
- GraphQL
- [Mailtrap](https://mailtrap.io/inboxes)

## Instalação

Para instalar basta rodar o script install.sh, lembrando que é necessário o docker-compose instalado.

Na instalação são executadas as seguintes ações:
- Inicia o Docker (Nginx/MySQL/Workspace)
- Cria um novo banco de dados (remove se este existir)
- Limpa o cache da configuração do Laravel (App/API)
- Limpa o cache do Laravel (App/API)
- Gera uma nova chave do Laravel (App/API)
- Executa os migrations do Laravel (App/API)
- Executa os seeds do Laravel (App/API)
- Exibe o status dos containers do Docker
- Executa os testes do PHPUnit (App/API)

## Controles do App

Foram criados dois scripts (start.sh/stop.sh) para controlar o Docker.

## Acesso ao App

Estes são os principais acessos ao app:
- [AppTCO](http://localhost/)
- [API AppTCO](http://localhost:9090/)
- [PHPMyAdmin](http://127.0.0.1:9090/graphql-playground)
- [GraphQL](http://127.0.0.1:9090/graphql-playground)