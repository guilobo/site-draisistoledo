# Dra. Isis Toledo - Site Oficial

<p align="center">
  <a href="https://draisistoledo.com/" target="_blank">
    <img src="https://img.shields.io/badge/Site%20Online-draisistoledo.com-1f8b4c?style=for-the-badge" alt="Site online">
  </a>
</p>

Projeto institucional e administrativo do site da **Dra. Isis Toledo**, desenvolvido com foco em performance, escalabilidade e facilidade de manutenção.

## Producao

O site esta ativo em:

**https://draisistoledo.com/**

## Como o site foi feito

Este projeto foi construido com uma stack moderna em PHP e frontend:

- `Laravel 12` como base da aplicacao web.
- `Filament 5` para o painel administrativo.
- `PHP 8.3` como runtime principal.
- `Vite` + `NPM` para build de assets.
- `MySQL` (ambiente de producao) para persistencia de dados.

Arquitetura aplicada:

- Estrutura MVC padrao do Laravel.
- Rotas separadas para interface publica e fluxos internos.
- Configuracoes por ambiente usando `.env`.
- Pipeline de build frontend para CSS/JS otimizados.

## Ambiente local

### Requisitos

- PHP `8.3+`
- Composer
- Node.js + NPM
- Banco de dados MySQL/MariaDB

### Instalacao

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

### Executar em desenvolvimento

```bash
composer run dev
```

## Seguranca e versionamento

- Arquivos sensiveis (`.env`, chaves, dumps, credenciais) estao bloqueados no `.gitignore`.
- O versionamento Git foi configurado para ocorrer apenas dentro da pasta `site`.

## Licenca

Projeto privado de uso institucional.
