# Hotspot Mikrotik Generator

Este repositório contém a base para um hotspot Mikrotik com uma página de geração de hotspot. A aplicação permite o download dos arquivos necessários para seu funcionamento assim que as informações são salvas no painel de administração.

## Funcionalidades

- **Geração de Hotspot**: Interface para configurar e gerar arquivos de hotspot.
- **Upload de Vídeos**: Possibilidade de fazer upload de vídeos que serão exibidos para o usuário ao conectar-se à rede.
- **Configuração de Trial**: Quando ativado, o usuário visualiza vídeos antes de obter acesso à internet. Se o trial estiver desativado, apenas a opção de login será mostrada ao usuário.
- **Login de Usuário**: Opção de login caso necessário.

## Como Iniciar

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/Hotspot-Mikrotik-Generator.git
```

2. Navegue até o diretório do projeto:
```bash
cd Hotspot-Mikrotik-Generator
```

3. Para rodar a aplicação, é necessário ter um servidor web com suporte a PHP. Algumas ferramentas que podem ser utilizadas para isso são:
- **XAMPP** (Windows, Linux, MacOS)
- **WAMP** (Windows)
- **MAMP** (MacOS)
- **Laragon** (Windows)

4. Abra o arquivo `index.php` no seu navegador para acessar o painel de administração.

## Uso

1. Utilize o painel de administração para gerar os arquivos de hotspot.
2. Após gerar e baixar os arquivos na página de configuração, substitua os arquivos da pasta hotspot no Mikrotik pelos que estão dentro do arquivo zip baixado.

## Requisitos

- Servidor web com suporte a PHP.
- Mikrotik configurado para aceitar o trial e login de usuários.

## Screenshots



## Contribuição

1. Faça um fork do projeto.
2. Crie uma nova branch: `git checkout -b minha-nova-funcionalidade`.
3. Faça suas alterações e commit: `git commit -m 'Adiciona nova funcionalidade'`.
4. Envie para o branch original: `git push origin minha-nova-funcionalidade`.
5. Crie um pull request.
