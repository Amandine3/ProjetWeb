create or replace procedure add_contact (int,text,text,text,text) 
as
'
  declare f_sexe alias for $1;
  declare f_nom alias for $2;
  declare f_prenom alias for $3;
  declare f_comm alias for $4;
  declare f_email alias for $5;

begin
 	insert into contact (sexe,nom,prenom,comm,email) 
	values (f_sexe,f_nom,f_prenom,f_comm,f_email);
end;
'
language 'plpgsql';
