create database tsakitsaky;
\c tsakitsaky;

CREATE SEQUENCE client_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_client_sequence_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('client_sequence');
    formatted_id := 'CLT' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table client(
    id varchar(10) primary key,
    nom varchar(20) not null,
    prenoms varchar(20),
    telephone double precision not null,
    adresse varchar(30)
);

CREATE SEQUENCE pack_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_pack_sequence_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('pack_sequence');
    formatted_id := 'PCK' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table pack(
    id varchar(10) primary key,
    nom varchar(20) not null,
    prix double precision not null
);

create table unite(
    id serial primary key,
    nom varchar(20) not null
);

insert into unite(nom) values
('Piece'),
('Kg'),
('g'),
('L');


CREATE SEQUENCE produit_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_produit_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('produit_sequence');
    formatted_id := 'PDT' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table produit(
    id varchar(10) primary key,
    nom varchar(20) not null,
    idunite int references unite(id)
);

create table image(
    id serial primary key,
    idpack varchar(10) references pack(id),
    path varchar(50) not null
);

CREATE SEQUENCE compo_pack_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_compo_pack_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('compo_pack_sequence');
    formatted_id := 'COMPPACK' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table composition(
    id varchar(20) primary key,
    idpack varchar(10) references pack(id),
    idproduit varchar(10) references produit(id),
    quantite double precision not null
);

create table mode_paiment(
    id serial primary key,
    nom varchar(20) not null
);

insert into mode_paiment(nom) values
('Mvola'),
('Orange Money'),
('Airtel Money');

CREATE SEQUENCE paiement_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_payement_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('paiement_sequence');
    formatted_id := 'PAY' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table paiement(
    id varchar(10) primary key,
    idresponsable int references users(id),
    idclient varchar(10) references client(id),
    idpack varchar(10) references pack(id),
    idmode_paiment int references mode_paiment(id),
    telephone double precision not null,
    montant double precision not null,
    reference double precision not null,
    date timestamp
);

create or REPLACE view somme_vendu as
select b.idresponsable,sum(pack.prix*b.quantite) as montant_vendu from billet as b
join users on users.id = b.idresponsable
join pack on pack.id = b.idpack
group by b.idresponsable;

create or replace view somme_recu as
select pai.idresponsable,sum(pai.montant) as montant_recu from paiement as pai
join users on users.id = pai.idresponsable
group by pai.idresponsable;


create or replace view somme_reste as
select somme_recu.idresponsable,(somme_vendu.montant_vendu - somme_recu.montant_recu) as reste from somme_recu
join somme_vendu on somme_vendu.idresponsable = somme_recu.idresponsable;


CREATE SEQUENCE axe_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_axe_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('axe_sequence');
    formatted_id := 'AXE' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table axe(
    id varchar(10) primary key,
    nom varchar(20) not null
);


CREATE SEQUENCE arret_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_arret_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('arret_sequence');
    formatted_id := 'ART' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table arret(
    id varchar(10) primary key,
    nom varchar(20) not null
);


CREATE SEQUENCE arret_axe_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_arret_axe_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('arret_axe_sequence');
    formatted_id := 'ARTAXE' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table arret_axe(
    id varchar(20) primary key,
    idaxe varchar(10) references axe(id),
    idarret varchar(10) references arret(id)
);


CREATE SEQUENCE billet_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_billet_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('billet_sequence');
    formatted_id := 'BLT' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table billet(
    id varchar(10) primary key,
    idclient varchar(10) references client(id),
    idresponsable int references users(id),
    idpack varchar(10) references pack(id),
    idaxe varchar(10) references axe(id),
    quantite double precision not null,
    date timestamp
);


create or replace view vente_par_pack as
select p.id,p.nom,sum(b.quantite) as total_quantite,sum(b.quantite*p.prix) as total_prix
from billet as b join pack as p on b.idpack = p.id
group by p.id
order by sum(b.quantite*p.prix) DESC;


CREATE SEQUENCE achat_sequence START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE FUNCTION gen_achat_seq_id() RETURNS text AS $$
DECLARE
    next_id integer;
    formatted_id text;
BEGIN
    next_id := nextval('achat_sequence');
    formatted_id := 'ACHAT' || lpad(next_id::text, 3, '0');
    RETURN formatted_id;
END;
$$ LANGUAGE plpgsql;

create table achatMat(
    id varchar(20) primary key,
    idproduit varchar(10) references produit(id),
    prix double precision not null,
    date timestamp
);

create or replace view prix_produit as
select p.id,p.nom as produit, u.nom,a.prix as unite from produit as p
join unite as u on u.id = p.idunite
join achatMat as a on a.idproduit=p.id;

