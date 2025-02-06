## API simples em PHP sem frameworks

O projeto possui o seguinte ciclo

##### bootstrap
- Inicializa a requisição utilizando o RequestBuilder
- Instancia a aplicação
- Perfoma a requisição

##### application
- Instancia o route handler 
- Performa a requisição para a rota
- Retorna um echo da resposta transformada para o cliente solicitante

##### route handler
- Busca a rota solicitada nas rotas registradas na aplicação
- Caso a rota não exista é retornado uma resposta para o application
- Executa as instruções da rota

#### Como rodar
O projeto está rodando sob o docker com o docker compose, para subir os container só rodar:
```
docker compose up -d
```

O servidor está rodando na porta 8000, já está tudo configurado no docker então não precisar fazer nada
Internamente está sendo utilizado 
```
php -S 0.0.0.0:8000 /usr/src/app/index.php
```

O comando acima está rodando por meio do supervisor no arquivo
```
docker/supervisor/supervisor.conf
```

#### Tecnologias utilizadas
PHP 8.2 \
PHPUnit 10 \
Docker \
Docker compose \