#### API simples em PHP sem frameworks

O projeto possui o seguinte ciclo

bootstrap
    - Inicializa a requisição utilizando o RequestBuilder
    - Instancia a aplicação
    - Perfoma a requisição

application
    - Instancia o route handler 
    - Performa a requisição para a rota
    - Retorna um echo da resposta transformada para o cliente solicitante

route handler
    - Busca a rota solicitada nas rotas registradas na aplicação
    - Caso a rota não exista é retornado uma resposta para o application
    - Executa as instruções da rota