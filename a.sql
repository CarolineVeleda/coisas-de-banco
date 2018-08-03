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



	





