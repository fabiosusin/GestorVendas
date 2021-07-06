CREATE TABLE Fornecedor (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    descricao varchar(255),
    telefone varchar(20),
	email varchar(100),
    PRIMARY KEY (id)
);

CREATE TABLE Cliente (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
	senha varchar(255) NOT NULL,
    telefone varchar(20),
	email varchar(100),
	cartaoCredito varchar(100),
    PRIMARY KEY (id)
);

CREATE TABLE Endereco (
    id int NOT NULL AUTO_INCREMENT,
    rua varchar(255) NOT NULL,
    numero char(5),
    complemento varchar(255),
	bairro varchar(100),
	cep varchar(20),
	cidade varchar(100),
	estado char(2),
	ClienteID int,
	FornecedorID int,
	PRIMARY KEY (id),
    FOREIGN KEY (ClienteID) REFERENCES Cliente(id),
	FOREIGN KEY (FornecedorID) REFERENCES Fornecedor(id)	
);

CREATE TABLE Produto (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
	descricao varchar(255) NOT NULL,
    fotoUrl varchar(255),
	FornecedorID int NOT NULL,
	FOREIGN KEY (FornecedorID) REFERENCES Fornecedor(id),
    PRIMARY KEY (id)
);

CREATE TABLE Estoque (
    id int NOT NULL AUTO_INCREMENT,
    quantidade int NOT NULL,
	preco double NOT NULL,
	ProdutoID int NOT NULL,
	FOREIGN KEY (ProdutoID) REFERENCES Produto(id),
	PRIMARY KEY (id)
);

CREATE TABLE Pedido (
    id int NOT NULL AUTO_INCREMENT,
    dataPedido date NOT NULL,
	dataEntrega date,
	situacao VARCHAR(255) NOT NULL,
	ClienteID int NOT NULL,
	FOREIGN KEY (ClienteID) REFERENCES Cliente(id),
	PRIMARY KEY (id)
);

CREATE TABLE ItemPedido (
    id int NOT NULL AUTO_INCREMENT,
	quantidade int NOT NULL,
    preco double NOT NULL,
	PedidoID int NOT NULL, 
	ProdutoID int NOT NULL,
	FOREIGN KEY (PedidoID) REFERENCES Pedido(id),
	FOREIGN KEY (ProdutoID) REFERENCES Produto(id),
	PRIMARY KEY (id)
);
