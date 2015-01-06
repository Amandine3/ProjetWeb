
create or replace function addachat(integer, integer)
RETURNS integer as
'
    declare f_client alias for $1;
    declare f_jeu alias for $2;
    declare id integer;
    declare idc integer;
    declare retour integer;
    begin
	select into idc idclient from client where idclient=f_client;
	if not found then
	    retour=2;
	else
	    insert into achat(idclient, idjeux, dateachat) values (f_client, f_jeu, current_date);
	    select into id idachat from achat where idclient=f_client and
						  idjeux=f_jeu and
						  dateachat=current_date;
	    if not found then
		retour=0;
	    else
	        retour=1;
	    end if;
    end if;
    return retour;
end;
'
language plpgsql;