# Documentação do Sistema Oficina

## Visão Geral
Este projeto é um sistema para gestão de oficinas, contendo funcionalidades para cadastro e gerenciamento de clientes, produtos, e usuários. Inclui um sistema de login e logout, além de interações com um banco de dados relacional para armazenar as informações necessárias.

## Estrutura do Projeto

### Diretório Raiz
- **README.md**: Documentação inicial do projeto.
- **index.php**: Página principal do sistema.
- **login.php**: Página de autenticação de usuários.
- **logout.php**: Página para encerramento de sessão.
- **bdoficina.sql**: Script do banco de dados.

### Diretório `cadastro`
Arquivos dedicados ao cadastro de entidades no sistema:
- **cadClientes.php**: Cadastro de clientes.
- **cadProduto.php**: Cadastro de produtos.
- **cadUsuario.php**: Cadastro de usuários.

### Diretório `assets`
Arquivos estáticos, incluindo imagens e outros recursos visuais:
- **img/logo.png**: Logotipo principal do sistema.

## Banco de Dados
O banco de dados é configurado através do script **bdoficina.sql**, que define tabelas e relações para:
- Usuários
- Clientes
- Produtos

## Principais Funcionalidades
1. **Autenticação**:
   - Implementada nos arquivos `login.php` e `logout.php`.
   - Gerencia acesso ao sistema com segurança.

2. **Cadastro e Gerenciamento**:
   - Módulos para adicionar, visualizar e modificar dados de clientes, produtos e usuários.

3. **Interface Dinâmica**:
   - Arquivos PHP utilizam integração com o banco de dados para exibir informações dinâmicas.

## Configuração
1. **Banco de Dados**:
   - Importe o arquivo `bdoficina.sql` em um servidor MySQL.

2. **Servidor Web**:
   - Certifique-se de que o PHP e o MySQL estão configurados corretamente.
   - Coloque os arquivos do projeto em um diretório acessível pelo servidor web.

3. **Login Inicial**:
   - Acesse `login.php` para autenticar-se.

## Desenvolvimento Futuro
- Implementar validações adicionais nos formulários.
- Melhorar a interface gráfica.
- Adicionar relatórios e análises baseados nos dados armazenados.

---

Esta documentação foi gerada a partir da análise dos arquivos do projeto. Caso algo precise de mais detalhes, consulte os arquivos diretamente no repositório.
