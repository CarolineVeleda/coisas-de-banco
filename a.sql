create view "viu" AS
(select nome,cpf from cliente)

select * from "viu" where
cpf in (select cpf
from funcionario)

create index "iaiDex" ON cliente(cpf)
drop index "iaiDex"

select * from cliente


insert into cliente (nome,cpf,email) values ('teste deleteme denovo pfvr julia','7896541230','okok@gmail.com');

delete from cliente where codcliente>10

begin transaction;

--update conta set valor=valor-500 where conta.cli = 'fulano';
--update conta set valor=valor+500 where conta.cli = 'beltrano';

insert into cliente (nome,cpf,email) values ('teste deleteme denovo pfvr julia','7896541230','okok@gmail.com')
select * from cliente;
rollback work
commit work; 




----exercicios----


--1 Crie uma view que liste os dados de funcionários 
--(nome, cpf, salario, dataNascimento, sexo e nome do departamento)

select * from funcionario;
select * from departamento;

CREATE VIEW "viewFuncionario" as (SELECT f.nome,f.cpf,f.salario,f.datanascimento,f.sexo,d.nome as "a"
	from funcionario f left join departamento d
	on d.coddepartamento=f.coddepartamento)
	


SELECT * from "viewFuncionario";



--2 Crie uma view que liste o número de compras e o total em 
--reais comprado por cada cliente (o nome e cpf do cliente)



CREATE VIEW viewCompras as (select (count(nf.codcliente)) "totalCompras", coalesce(sum(it.quantidade*it.precounitvenda)) "total$", c.nome, c.cpf 
	from cliente c left outer join notafiscal nf 
	on c.codcliente = nf.codcliente 
	right outer join itemvenda it on it.codnotafiscal = nf.codnotafiscal
	group by c.codcliente
	
	
	) 

select * from viewCompras



--3 Faça uma consulta que liste o nome dos funcionários e departamentos. 
--Faça uma view para cada item de listagem pedido:
select f.nome,d.nome 
	from funcionario f left outer join departamento d
	on f.coddepartamento = d.coddepartamento 


--a. Apenas funcionários alocados em um departamento e departamento com funcionários.

 CREATE VIEW vwFuncionario1Depto as (select f.nome, d.nome as nomedepto
	from funcionario f left outer join departamento d
	on f.coddepartamento = d.coddepartamento 
	group by d.coddepartamento,f.nome)

select * from vwFuncionario1Depto


--b. Todos funcionários e apenas departamentos com funcionários.


 CREATE VIEW vwDeptoFuncionarios as (select f.nome, d.nome as nomedepto
	from funcionario f right outer join departamento d
	on f.coddepartamento = d.coddepartamento 
	group by d.coddepartamento,f.nome)

select * from vwDeptoFuncionarios

--c. Apenas funcionários alocados em um departamento e todos os departamentos.


 CREATE VIEW vwDeptoFuncionarios as (select f.nome, d.nome as nomedepto
	from funcionario f left outer join departamento d
	on f.coddepartamento = d.coddepartamento 
	group by d.coddepartamento,f.nome)

select * from vwDeptoFuncionarios



--d. Todos funcionários e todos departamentos.
--Após criar as views, insira 2 departamentos sem funcionários e 2 funcionários sem vinculo a um departamento e
--observe as mudanças nas views.


























select * from notafiscal
select * from funcionario
select * from cliente
select * from itemvenda
select * from departamento
select * from produto



