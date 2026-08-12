# API de Postagens - Dra. Isis Toledo

Esta documentacao explica como usar a API de postagens do site.

## Autenticacao

A API usa **Bearer Token**.

Envie o token no header:

```http
Authorization: Bearer SEU_TOKEN_AQUI
Accept: application/json
```

As chaves sao geradas no painel administrativo em `{{BASE_URL}}/admin/api-tokens`.

Nos exemplos abaixo, `{{BASE_URL}}` e preenchido automaticamente com a URL base do ambiente atual.

## Abilities da chave

- `categories:view` - permite listar categorias
- `categories:create` - permite criar categorias
- `posts:create` - permite criar posts
- `posts:update` - permite editar posts existentes

Se a chave nao tiver a permissao necessaria, a API responde com `403 Forbidden`.

## Endpoints

### Listar categorias

```http
GET /api/categories
```

### Criar categoria

```http
POST /api/categories
```

### Criar post

```http
POST /api/posts
```

### Editar post

```http
PUT /api/posts/{id}
```

O update usa o **ID do post**.

## Campos aceitos em categorias

- `name`
- `slug`
- `description`

Se `slug` nao for enviado, ele sera gerado automaticamente a partir do nome.

## Campos aceitos

Os campos seguem o formulario atual do painel:

- `title`
- `slug`
- `excerpt`
- `content`
- `categories[]` - array com slugs de categorias ja existentes
- `youtube_url`
- `featured_image` - upload multipart
- `status` - `draft`, `published`, `archived`
- `published_at`
- `tag`
- `seo_title`
- `seo_description`

## Regras importantes

- Se `youtube_url` for enviado e valido, o embed do YouTube sera gerado automaticamente.
- Se `youtube_url` nao for enviado, `content` e obrigatorio.
- Se `slug` nao for enviado, ele sera gerado automaticamente a partir do titulo.
- As categorias devem existir previamente no sistema.
- A imagem destacada deve ser enviada como `multipart/form-data`.

## Exemplo - listar categorias

```bash
curl -X GET "{{BASE_URL}}/api/categories" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json"
```

## Exemplo - criar categoria

```bash
curl -X POST "{{BASE_URL}}/api/categories" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d "{\"name\":\"Na Midia\",\"slug\":\"na-midia\",\"description\":\"Participacoes em midia\"}"
```

## Exemplo - criacao com conteudo HTML

```bash
curl -X POST "{{BASE_URL}}/api/posts" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -F "title=Novo post via API" \
  -F "excerpt=Resumo do post" \
  -F "content=<p>Conteudo do post.</p>" \
  -F "categories[]=na-midia" \
  -F "status=published" \
  -F "published_at=2026-07-09 14:00:00" \
  -F "tag=Jovem Pan" \
  -F "seo_title=Novo post via API" \
  -F "seo_description=Descricao SEO" \
  -F "featured_image=@capa.jpg"
```

## Exemplo - criacao com YouTube

```bash
curl -X POST "{{BASE_URL}}/api/posts" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -F "title=Post com video" \
  -F "youtube_url=https://www.youtube.com/watch?v=JUT-6AvdsME" \
  -F "status=draft" \
  -F "categories[]=na-midia"
```

## Exemplo - edicao

```bash
curl -X PUT "{{BASE_URL}}/api/posts/12" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -F "title=Post atualizado" \
  -F "content=<p>Conteudo atualizado.</p>" \
  -F "status=published"
```

## Resposta esperada

A API retorna os dados principais do post salvo, incluindo:

- `id`
- `title`
- `slug`
- `status`
- `categories`
- `featured_image_path`
- `featured_image_url`
- `public_url`

No caso das categorias, a API retorna:

- `id`
- `name`
- `slug`
- `description`

## Erros comuns

### 401 Unauthorized

Token ausente, invalido ou revogado.

### 403 Forbidden

O token existe, mas nao tem a ability necessaria.

### 422 Unprocessable Entity

Erro de validacao, como:

- slug duplicado
- categoria inexistente
- imagem invalida
- ausencia de `content` quando `youtube_url` nao foi enviado
