create view "viu" AS
(select nome,cpf from cliente)

select * from "viu" where
cpf in (select cpf
from funcionario)

create index "iaiDex" ON cliente(cpf)
