# API de Postagens — Dra. Isis Toledo

Esta documentação explica como usar a API de postagens do site.

## Autenticação

A API usa **Bearer Token**.

Envie o token no header:

```http
Authorization: Bearer SEU_TOKEN_AQUI
Accept: application/json
```

As chaves são geradas no painel administrativo em `/admin/api-tokens`.

## Abilities da chave

- `categories:view` — permite listar categorias
- `categories:create` — permite criar categorias
- `posts:create` — permite criar posts
- `posts:update` — permite editar posts existentes

Se a chave não tiver a permissão necessária, a API responde com `403 Forbidden`.

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

Se `slug` não for enviado, ele será gerado automaticamente a partir do nome.

## Campos aceitos

Os campos seguem o formulário atual do painel:

- `title`
- `slug`
- `excerpt`
- `content`
- `categories[]` — array com slugs de categorias já existentes
- `youtube_url`
- `featured_image` — upload multipart
- `status` — `draft`, `published`, `archived`
- `published_at`
- `tag`
- `seo_title`
- `seo_description`

## Regras importantes

- Se `youtube_url` for enviado e válido, o embed do YouTube será gerado automaticamente.
- Se `youtube_url` não for enviado, `content` é obrigatório.
- Se `slug` não for enviado, ele será gerado automaticamente a partir do título.
- As categorias devem existir previamente no sistema.
- A imagem destacada deve ser enviada como `multipart/form-data`.

## Exemplo — listar categorias

```bash
curl -X GET "http://indoor.draisis/api/categories" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json"
```

## Exemplo — criar categoria

```bash
curl -X POST "http://indoor.draisis/api/categories" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d "{\"name\":\"Na Mídia\",\"slug\":\"na-midia\",\"description\":\"Participações em mídia\"}"
```

## Exemplo — criação com conteúdo HTML

```bash
curl -X POST "http://indoor.draisis/api/posts" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -F "title=Novo post via API" \
  -F "excerpt=Resumo do post" \
  -F "content=<p>Conteúdo do post.</p>" \
  -F "categories[]=na-midia" \
  -F "status=published" \
  -F "published_at=2026-07-09 14:00:00" \
  -F "tag=Jovem Pan" \
  -F "seo_title=Novo post via API" \
  -F "seo_description=Descrição SEO" \
  -F "featured_image=@capa.jpg"
```

## Exemplo — criação com YouTube

```bash
curl -X POST "http://indoor.draisis/api/posts" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -F "title=Post com vídeo" \
  -F "youtube_url=https://www.youtube.com/watch?v=JUT-6AvdsME" \
  -F "status=draft" \
  -F "categories[]=na-midia"
```

## Exemplo — edição

```bash
curl -X PUT "http://indoor.draisis/api/posts/12" \
  -H "Authorization: Bearer SEU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -F "title=Post atualizado" \
  -F "content=<p>Conteúdo atualizado.</p>" \
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

Token ausente, inválido ou revogado.

### 403 Forbidden

O token existe, mas não tem a ability necessária.

### 422 Unprocessable Entity

Erro de validação, como:

- slug duplicado
- categoria inexistente
- imagem inválida
- ausência de `content` quando `youtube_url` não foi enviado
