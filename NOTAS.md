Notas 
==============================
Exemplo: https://github.com/zfcampus/statuslib-example

# Obtendo token, com usuário e senha

```json
POST /oauth HTTP/1.1
Accept: application/json
Content-Type: application/json

{
    "grant_type": "password",
    "client_id": "testclient2",
    "client_secret": "test",
    "username": "testuser",
    "password": "testpass"
}
```

-- Retorno Token
```json
{
    "access_token": "470d9f3c6b0371ff2a88d0c554cbee9cad495e8d",
    "refresh_token": "",
    "expires_in": 3600,
    "scope": null,
    "token_type": "Bearer"
}
```

# Bower

Gerenciador de dependencias, para o front-end.

- Instalando pacote para oauth2
https://github.com/oauthjs/angular-oauth2

```
bower install angular-oauth2 --c
```

